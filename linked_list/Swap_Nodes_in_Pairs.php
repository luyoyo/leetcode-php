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
 * @return ListNode
 * 递归
 */
function swapPairs($head) {
    if ($head == null || $head->next == null) {
        return $head;
    }

    $nextNode = $head->next;
    $head->next = swapPairs($nextNode->next);
    $nextNode->next = $head;
    return $nextNode;
}

/**
 * @param ListNode $head
 * @return ListNode
 * 迭代
 */
function swapPairs2($head) {
    while ($head == null || $head->next == null) {
        return $head;
    }

    $prevNode = new ListNode(-1);
    $dummy = $prevNode;
    while ($head != null && $head->next != null) {
        $prevNode->next = $head->next;
        $head->next = $head->next->next;
        $prevNode->next->next = $head;

        $prevNode = $prevNode->next->next;
        $head = $head->next;
    }
    return $dummy->next;
}

/**
 * 构建一个单链表(将数组转换成链表)
 */
function createLinkedList($arr)
{
    $current = new ListNode(array_shift($arr)); //头节点
    if (empty($arr)) {
        return $current;
    }

    $linkedList = [];
    while (!empty($arr)) {
        while ($current->next != null) {
            $linkedList[] = $current;
            $current = $current->next;
        }
        $current->next = new ListNode(array_shift($arr));
    }
    return $linkedList[0];
}

$list = createLinkedList([2,1,4,3]);
$res = swapPairs2($list);
print_r($res);