<?php

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { 
        $this->val = $val; 
    }
}

function deleteDuplicates($head) {
    $current = $head;
    while ($current != null && $current->next != null) {
        if ($current->val == $current->next->val) {
            $current->next = $current->next->next;
        } else {
            $current = $current->next;
        }
    }
    return $head;
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

$list = createLinkedList([1,2,2,2,8,8]);

$res = deleteDuplicates($list);
print_r($res);