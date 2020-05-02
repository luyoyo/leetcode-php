<?php

function isPalindrome($x) {
    if ($x < 0) {
        return false;
    }

    $s = (string)$x;
    $start = 0;
    $end = strlen($s) - 1;
    $half = floor(strlen($s)/2);
    while ($start <= $half) {
        if ($s[$start] != $s[$end]) {
            return false;
        }
        $start++;
        $end--;
    }
    return true;
}