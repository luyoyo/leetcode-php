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
function addTwoNumbers($l1, $l2) {
    $carry = 0;
    $dummyHead = new ListNode(0);
    $cur = $dummyHead;
    while ($l1 !== null || $l2 !== null) {
        echo $carry . "<br>";
        $x = $l1 == null ? 0 : $l1->val;
        $y = $l2 == null ? 0 : $l2->val;
        $sum = $carry + $x + $y;
        $carry = floor($sum / 10);
        $sum = $sum % 10;
        $cur->next = new ListNode($sum);
        $cur = $cur->next;

        if ($l1 !== null) {
            $l1 = $l1->next;
        }
        if ($l2 !== null) {
            $l2 = $l2->next;
        }
    }
    if($carry == 1) {
        $cur->next = new ListNode($carry);
    }
    return $dummyHead->next;
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

$l1 = createLinkedList([9,4,3]);
$l2 = createLinkedList([5,6,4]);
$res = addTwoNumbers($l1, $l2);
print_r($res);