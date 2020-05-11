<?php

function lengthOfLongestSubstring($s) {
    $len = strlen($s);
    if ($len <= 1) {
        return $len;
    }

    $hashMap = [];
    $left = 0;
    $maxLen = 0;
    for ($i = 0; $i < $len; $i++) {
        if (isset($hashMap[$s[$i]])) {
            $left = max($left, $hashMap[$s[$i]] + 1);
        }
        $hashMap[$s[$i]] = $i;
        $maxLen = max($maxLen, $i - $left + 1);
    }
    return $maxLen;
}

$str = "pwkew";
$res = lengthOfLongestSubstring($str);
print_r($res);