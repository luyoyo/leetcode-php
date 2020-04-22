<?php
/**
 * 由于节点完全相同才能算公共节点，PHP版本不通过，由 go 实现
 */

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { 
        $this->val = $val; 
    }
}

/**
 * @param ListNode $headA
 * @param ListNode $headB
 * @return ListNode
 * 执行结果：不通过
 */
function getIntersectionNode($headA, $headB) {
    $hashMap = [];
    while ($headA) {
        $hashMap[] = $headA;
        $headA = $headA->next;
    }
    while ($headB) {
        if (in_array($headB, $hashMap)) {
            return $headB;
        }
        $headB = $headB->next;
    }
    return null;
}

/**
 * 执行结果：不通过
 */
function getIntersectionNode2($headA, $headB) {
    if ($headA == null || $headB == null) {
        return null;
    }

    $pA = $headA;
    $pB = $headB;
    while ($pA != $pB) {
        $pA = $pA == null ? $headB : $pA->next;
        $pB = $pB == null ? $headA : $pB->next;
    }
    return $pA;
}

/**
 * 执行结果：不通过
 */
function getIntersectionNode3($headA, $headB) {
    $lenA = getListLength($headA);
    $lenB = getListLength($headB);

    $diffLen = $lenA > $lenB ? $lenA - $lenB : $lenB - $lenA;
    $headLong = $lenA > $lenB ? $headA : $headB;
    $headShort = $lenA > $lenB ? $headB : $headA;

    //先在长链表上走几步，再同时在两个链表上遍历
    for ($i = 0; $i < $diffLen; $i++) {
        $headLong = $headLong->next;
    }
    while ($headLong != $headShort) {
        $headLong = $headLong->next;
        $headShort = $headShort->next;
    }
    return $headLong;
}

/**
 * 获取链表的长度
 */
function getListLength($head)
{
    $length = 0;
    $current = $head;
    while ($current != null) {
        $length++;
        $current = $current->next;
    }
    return $length;
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

$l1 = createLinkedList([4,1,8,4,5]);
$l2 = createLinkedList([5,0,1,8,4,5]);
$res = getIntersectionNode3($l1, $l2);
print_r($res);