<?php

function strStr1($haystack, $needle) {
    $len = strlen($haystack);
    $nLen = strlen($needle);
    if ($nLen == 0) {
        return 0;
    }
    if ($len <= 0 || $nLen > $len) {
        return -1;
    }
    for ($i = 0; $i < $len; $i++) {
        if ($haystack[$i] == $needle[0]) {
            $str = substr($haystack, $i, $nLen);
            if ($str == $needle) {
                return $i;
            }
        }
    }
    return -1;
}

function strStr2($haystack, $needle) {
    $len = strlen($haystack);
    $nLen = strlen($needle);
    if ($nLen == 0) {
        return 0;
    }
    if ($len <= 0 || $nLen > $len) {
        return -1;
    }
    for ($i = 0; $i < $len; $i++) {
        $j = 0;
        while ($haystack[$i + $j] == $needle[$j] && $j < $nLen) {
            $j++;
        }
        if ($j == $nLen) {
            return $i;
        }
    }
    return -1;
}