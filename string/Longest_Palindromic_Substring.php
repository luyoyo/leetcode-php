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


/**
 * 方法2:
 * https://github.com/labuladong/fucking-algorithm/blob/master/%E9%AB%98%E9%A2%91%E9%9D%A2%E8%AF%95%E7%B3%BB%E5%88%97/%E6%9C%80%E9%95%BF%E5%9B%9E%E6%96%87%E5%AD%90%E4%B8%B2.md
 */ 

function palindrome($s, $l, $r) {
    while ($l >= 0 && $r < strlen($s) && $s[$l] == $s[$r]) {
        $l--;
        $r++;
    }
    return substr($s, $l + 1, $r - $l - 1);
}

function longestPalindrome2($s) {
    $len = strlen($s);
    if ($len <= 1) {
        return $s;
    }
    $res = '';
    for ($i = 0; $i < $len; $i++) {
        $s1 = palindrome($s, $i, $i);
        $s2 = palindrome($s, $i, $i + 1);

        $res = strlen($s1) > strlen($res) ? $s1 : $res;
        $res = strlen($s2) > strlen($res) ? $s2 : $res;
    }
    return $res;
}



$s = "cbabcad";
$res = longestPalindrome2($s);
print_r($res);