<?php

function reverseVowels($s) {
    // 如果字符串为空，或只有一个字符，就没必要反转了
    if (strlen($s) <= 1) {
        return $s;
    }

    $vowelMap = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
    
    $len = strlen($s);
    $left = 0;
    $right = $len - 1;
    while ($left < $right) {
        // 从左判断当前元素是不是元音，若不是，则 left 指针右移
        while (!in_array($s[$left], $vowelMap) && $left < $len) {
            $left++;
        }
        
        // 从右判断当前元素是不是元音，若不是，则 right 指针左移
        while (!in_array($s[$right], $vowelMap) && $right >= 0) {
            $right--;
        }
        
        // 如果没有元音
        if ($left >= $right) {
            break;
        }

        // 交换前后元音
        // 如果前后元音相等，不需要交换了，直接移动左右指针
        if ($s[$left] != $s[$right]) {
            $temp = $s[$left];
            $s[$left] = $s[$right];
            $s[$right] = $temp;
        }

        $left++;
        $right--;
    }
    return $s;
}

$s = "leetcode";
$res = reverseVowels($s);
echo $res;