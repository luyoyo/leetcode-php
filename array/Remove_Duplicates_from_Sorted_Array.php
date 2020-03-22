<?php

function removeDuplicates(&$nums) {
    if (count($nums) <= 2) {
        return count($nums);
    }

    $i = 0;
    for ($j = 1; $j < count($nums); $j++) {
        if ($nums[$i] == $nums[$j]) {
            continue;
        }
        $i++;
        $nums[$i] = $nums[$j];
    }
    return count(array_slice($nums, 0, $i + 1));
}