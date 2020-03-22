<?php

function threeSum($nums) {
    $result = [];
    $len = count($nums);
    for ($i = 0; $i < $len; $i++) {
        $a = $nums[$i];
        $sum = ($a > 0) ? 0 - $a : abs($a);
        
        $searched = [];
        for ($j = 0; $j < $len; $j++) {
            if ($j == $i) {
                continue;
            }
            if (!in_array($sum - $nums[$j], $searched)) {
                $searched[] = $nums[$j];
            } else {
                $tmp = [$a, $nums[$j], $sum - $nums[$j]];
                sort($tmp);
                if (in_array($tmp, $result)) {
                    continue;
                }
                $result[] = $tmp;
            }
        }
    }
    return $result;
}

function threeSum2($nums) {
    $len = count($nums);
    if ($len < 3) {
        return [];
    }

    sort($nums);
    if ($nums[0] > 0 || end($nums) < 0) {
        return [];
    }

    $res = [];
    for ($i = 0; $i < $len; $i++) {
        // 如果 i 与 i-1 值相同，说明上一次比较过了
        if ($i > 0 && $nums[$i] == $nums[$i-1]) {
            continue;
        }
        // 要对比的值
        $target = 0 - $nums[$i];

        $low = $i + 1;
        $high = $len - 1;
        while ($low < $high) {
            if ($nums[$low] + $nums[$high] == $target) {
                $res[] = [$nums[$i], $nums[$low], $nums[$high]];
                // 因为数组已经排好序，且要求返回的组合不能重复
                // 如果nums[low] == nums[low+1] 说明两个数重复，数据组合会重合。将 low 向后偏移一位
                while ($low < $high && $nums[$low] == $nums[$low + 1]) {
                    $low ++;
                }
                // 如果nums[high] == nums[high-1] 说明两个数重复，数据组合会重合。将 high 向前偏移一位
                while ($low < $high && $nums[$high] == $nums[$high - 1]) {
                    $high --;
                }
                // low 与 high 这对组合已经使用过，因此需要继续偏移
                $low ++; 
                $high --;
            } else if ($nums[$low] + $nums[$high] < $target) {
                $low ++;
            } else {
                $high --;
            }
        }
    }

    return $res;
}