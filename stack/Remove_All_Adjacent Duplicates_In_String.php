<?php

function removeDuplicates($S) {
    if (strlen($S) <= 1) {
        return $S;
    }

    $stack = [];
    $arr = str_split($S);
    while (!empty($arr)) {
        if (empty($stack)) {
            $stack[] = array_shift($arr);
        } else {
            if (current($arr) == end($stack)) {
                array_shift($arr);
                array_pop($stack);
            } else {
                $stack[] = array_shift($arr);
            }
        }
    }
    return implode("", $stack);
}

function removeDuplicates2($S) {
    $vowels = ['aa', 'bb', 'cc', 'dd', 'ee', 'ff', 'gg', 'hh', 'ii', 'jj', 'kk', 'll', 'mm', 'nn', 
    'oo', 'pp', 'qq', 'rr', 'ss', 'tt', 'uu', 'vv', 'ww', 'xx', 'yy', 'zz'];

    while (strlen($S) >= 2) {
        $S = str_replace($vowels, "", $S);
        if ($S == str_replace($vowels, "", $S)) {
            break;
        }
    }
    
    return $S;
}



$S = "zzbaeeafd";
$res = removeDuplicates2($S);
echo $res;