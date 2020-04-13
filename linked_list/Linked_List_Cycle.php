<?php

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { 
        $this->val = $val; 
    }
}

/**
 * @param ListNode $head
 * @return Boolean
 */
function hasCycle($head) {
    $hashMap = [];
    $curr = $head;
    while ($curr != null && $curr->next != null) {
        if (in_array($curr, $hashMap)) {
            return true;
        } 
        $hashMap[] = $curr;
        $curr = $curr->next;
    } 
    return false;
}

/**
 * 快慢指针法
 * 快指针每次移动2步，慢指针每次移动1步
 * 如果 fast 等于 slow，说明有环
 */
function hasCycle2($head) {
    if ($head == null || $head->next == null) {
        return false;
    }
    //快慢指针
    $slow = $head;
    $fast = $head->next;
    while ($slow != $fast) {
        //没有环，fast走到链表尾部，fast为空或者fast的next为空
        if($fast == null || $fast->next == null) {
            return false;
        }
        $slow = $slow->next;
        $fast = $fast->next->next;
    }
    return true;
}