<?php 

function isValid($s) {
    if (empty($s)) {
        return true;
    }
    //有效括号的个数一定是偶数
    $len = strlen($s);
    if ($len % 2 != 0) {
        return false;
    }

    $validMap = ['(' => ')', '{' => '}', '[' => ']'];
    $stack = [];
    for ($i = 0; $i < $len; $i++) {
        if (isset($validMap[$s[$i]])) {
            $stack[] = $s[$i];
        } else {
            if ($validMap[end($stack)] == $s[$i]) {
                array_pop($stack);
            } else {
                return false;
            }
        }
    }
    if (!empty($stack)) {
        return false;
    }
    return true;
}