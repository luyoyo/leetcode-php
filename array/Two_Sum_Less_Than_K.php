<?php

function twoSumLessThanK($A, $K) {
    if (empty($A)) {
        return -1;
    }
    sort($A);

    $left = 0;
    $right = count($A) - 1;
    $result = min($A);

    while ($left < $right) {
        if ($A[$left] + $A[$right] >= $K) {
            $right--;
        } else {
            $result = max($result, $A[$left] + $A[$right]);
            $left++;
        }
    }
    return $result == min($A) ? -1 : $result;
}

$A = [10, 20, 30];
$K = 35;
$res = twoSumLessThanK($A, $K);
print_r($res);