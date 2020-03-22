<?php

function removeElement(&$nums, $val) {
    foreach ($nums as $k => $v) {
        if ($v == $val) {
            unset($nums[$k]);
        }
    }
    return count($nums);
}

function removeElement2(&$nums, $val) {
    $i = 0;
    for ($j = 0; $j < count($nums); $j++) {
        if ($nums[$j] != $val) {
            $nums[$i] = $nums[$j];
            $i++;
        }
    }
    return $i;
}

function removeElement3(&$nums, $val) {
    $j = 0;
    for ($i = 0; $i < count($nums) - 1; $i++) {
        if ($nums[$i] != $val) {
            continue;
        }
        $nums[$i] = $nums[$i+1];
            $nums[$i+1] = $val;
    }
    return array_search($val, $nums);
}