<?php

function twoSum($arr, $target) {
    for ($i = 0; $i < count($arr) - 1; $i++) {
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$i] + $arr[$j] == $target) {
                echo "两个数分别为 $arr[$i] 和 $arr[$j]，其对应的下标为 $i 和 $j";
                exit;
            } 
        }
    }
    echo "无解";
}