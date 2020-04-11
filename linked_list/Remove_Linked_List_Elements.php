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
 * @param Integer $val
 * @return ListNode
 */
function removeElements($head, $val) {
    $solider = new ListNode(null);
    $solider->next = $head;

    $prev = $solider;
    while ($prev->next!= null) {
        if ($prev->next->val == $val) {
            $prev->next = $prev->next->next;
        } else {
            $prev = $prev->next;
        }
    }

    return $solider->next;
}

function removeElements2($head, $val) {
    //如果开头就是要删的元素，则将头节点移动
    while ($head->val == $val) {
        $head = $head->next;
    }

    //如果链表全是要删除的元素，则头节点经过上述操作后为空
    if ($head == null) {
        return null;
    }

    $prev = $head;
    while ($prev->next!= null) {
        if ($prev->next->val == $val) {
            $prev->next = $prev->next->next;
        } else {
            $prev = $prev->next;
        }
    }

    return $head;
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

$list = createLinkedList([1,2,6,3,4,5,6]);
$val = 6;
$res = removeElements2($list, $val);
print_r($res);