<?php

/**
 * @param String $s
 * @return String
 */
function longestPalindrome($s) {
    $len = strlen($s);
    if ($len <= 1) {
        return $s;
    }
    $start = $end = 0;
    for ($i = 0; $i < $len; $i++) {
        $oddLen = getCenterLen($s, $i, $i);
        $evenLen = getCenterLen($s, $i, $i + 1);
        $maxLen = max($oddLen, $evenLen);
        if ($maxLen > ($end - $start + 1)) {
            $start = $i - intval(($maxLen - 1) / 2);
            $end = $i + intval($maxLen / 2);
        }
    }
    return substr($s, $start, $end - $start + 1);
}

function getCenterLen($s, $left, $right) {
    while ($left >= 0 && $right < strlen($s) && $s[$left] == $s[$right]) {
        $left--;
        $right++;
    }
    return $right - $left - 1;
}

$s = "cbabcad";
$res = longestPalindrome($s);
print_r($res);