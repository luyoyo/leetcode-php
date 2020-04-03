<?php

function reverseString(&$s) {
    $end = count($s) - 1;
    for ($i = $end - 1; $i >= 0; $i--) {
        $s[] = $s[$i];
        unset($s[$i]);
    }
}

function reverseString2(&$s) {
    $left = 0;
    $right = count($s) - 1;
    while ($left < $right) {
        $temp = $s[$left];
        $s[$left] = $s[$right];
        $s[$right] = $temp;
        $left++;
        $right--;
    }
}