<?php

function plusOne($digits) {
    $len = count($digits);
    //因为是给最后一位加一，所以从后向前判断
    for ($i = $len - 1; $i >= 0; $i--) {
        //给当前位置加1 
        $digits[$i]++;
        /**
         * 该位置加1后和10取余，
         * 如果结果是 0，说明需要进一位，继续循环，反之则加1结束，直接返回
         */
        $digits[$i] %= 10;
        if ($digits[$i] % 10 != 0) {
            return $digits;
        }
    }
    //到这一步，说明是99、999这样的情况，这时digit已经变成 00、000，只需要给数组开头加个1即可。
    array_unshift($digits, 1);
    return $digits;
}

$digits = [1,9];
$res = plusOne($digits);
print_r($res);