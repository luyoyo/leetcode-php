<?php

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { 
        $this->val = $val; 
    }
}

/**
 * 递归
 * @param ListNode $l1
 * @param ListNode $l2
 * @return ListNode
 */
function mergeTwoLists($l1, $l2) {
    if ($l1 == null) {
        return $l2;
    }
    if ($l2 == null) {
        return $l1;
    }

    if ($l1->val <= $l2->val) {
        $l1->next = mergeTwoLists($l1->next, $l2);
        return $l1;
    }
    if ($l2->val <= $l1->val) {
        $l2->next = mergeTwoLists($l2->next, $l1);
        return $l2;
    }
}

/**
 * 迭代
 * @param ListNode $l1
 * @param ListNode $l2
 * @return ListNode
 */
function mergeTwoLists2($l1, $l2) {
    // 设置一个哨兵
    $node = new ListNode(null);
    $pre = $node;
    while ($l1 != null && $l2 != null) {
        if ($l1->val < $l2->val) {
            $pre->next = $l1;
            $l1 = $l1->next;
        } else {
            $pre->next = $l2;
            $l2 = $l2->next;
        }
        $pre = $pre->next;
    }
    if ($l1 == null) {
        $pre->next = $l2;
    } 
    if ($l2 == null) {
        $pre->next = $l1;
    }
    
    return $node->next;
}


/**
 * 构建一个单链表(将数组转换成链表)
 */
function createLinkedList($arr)
{
    $linkedList = [];
    $current = new ListNode(array_shift($arr)); //头节点
    while (!empty($arr)) {
        while ($current->next != null) {
            $linkedList[] = $current;
            $current = $current->next;
        }
        $current->next = new ListNode(array_shift($arr));
    }

    return $linkedList[0];
}

$l1 = createLinkedList([1,2,4,8]);
$l2 = createLinkedList([1,3,5]);

$res = mergeTwoLists2($l1, $l2);
print_r($res);