<?php

function countAndSay($n) {
    $output = '';
    for ($i = 1; $i <= $n; $i++) {
        if ($i == 1) {
            $output = '1';
        } else {
            $tmpArr = [];
            $tmp = '';
            for ($j = 0; $j <= strlen($output); $j++) {
                if (empty($tmpArr)) {
                    $tmpArr[] = $output[$j];
                } else {
                    if (isset($output[$j]) && $output[$j] == end($tmpArr)) {
                        $tmpArr[] = $output[$j];
                    } else {
                        if ($j !== strlen($output)) {
                            $j--;
                        }
                        $tmp .= count($tmpArr) . $tmpArr[0];
                        $tmpArr = [];
                    }
                }
            }
            $output = $tmp;
        }
    }
    return $output;
}