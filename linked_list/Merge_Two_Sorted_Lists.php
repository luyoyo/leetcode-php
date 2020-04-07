<?php

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { 
        $this->val = $val; 
    }
}

/**
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

$l1 = createLinkedList([1,2,4]);
$l2 = createLinkedList([1,3,5]);

$res = mergeTwoLists($l1, $l2);
print_r($res);