<?php

/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function searchInsert($nums, $target) {
    $pos = 0;
    foreach ($nums as $k => $v) {
        if ($v < $target) {
            $pos++;
        }
        if ($v == $target) {
            return $k;
        } 
    }
    return $pos;
}

function searchInsert2($nums, $target) {
    $start = 0;
    $end = count($nums) - 1;
    while ($start <= $end) {
        $mid = floor(($start + $end) / 2);
        if ($target == $nums[$mid]) {
            return $mid;
        } elseif ($target < $nums[$mid]) {
            $end = $mid - 1;
        } else {
            $start = $mid + 1;
        }
    }
    return $start; //要插入的位置
}

$arr = [1,3,9,10];
$target = 6;
echo searchInsert2($arr, $target);