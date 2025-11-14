<?php
function lineSum(string $filename, int $lineNumber): int {
    if (!file_exists($filename)) return 0;
    $h = fopen($filename, "r");
    if (!$h) return 0;
    $count = 0;
    while (($line = fgets($h)) !== false) {
        if (trim($line) === "" || trim($line)[0] === "#") continue;
        $count++;
        if ($count === $lineNumber) {
            $sum = 0;
            foreach (preg_split('/\s+/', trim($line)) as $t) {
                if (preg_match('/^-?\d+$/', $t)) $sum += intval($t);
            }
            fclose($h);
            return $sum;
        }
    }
    fclose($h);
    return 0;
}

echo lineSum("sums.txt", 2) . "<br>";
echo lineSum("sums.txt", 5) . "<br>";
?>