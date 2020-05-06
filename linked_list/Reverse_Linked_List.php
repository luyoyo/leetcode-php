<?php 
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { 
        $this->val = $val; 
    }
}

/**
 * 迭代
 * 定义两个指针： pre 和 cur ；pre 在前 cur 在后。
 * 每次让 pre 的 next 指向 cur ，实现一次局部反转
 * 局部反转完成之后， pre 和 cur 同时往前移动一个位置
 * 循环上述过程，直至 pre 到达链表尾部
 */
function reverseList($head) {
    $pre = null;
    $cur = $head;

    while ($cur != null) {
        $next = $cur->next;
        $cur->next = $pre;
        $pre = $cur;
        $cur = $next;
    }
    return $pre;
}

/**
 * 递归
 */
function reverseList2($head) {
    if ($head == null || $head->next == null) {
        return $head;
    }
    $p = $this->reverseList($head->next);
    $head->next->next = $head;
    $head->next = null;
    
    return $p;
}