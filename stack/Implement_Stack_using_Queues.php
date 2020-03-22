<?php

class MyStack {
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->q1 = [];
        $this->q2 = [];
    }

    /**
     * Push element x onto stack.
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->q1[] = $x;
    }

    /**
     * Removes the element on top of the stack and returns that element.
     * @return Integer
     */
    function pop() {
        while(count($this->q1) > 1) {
            $this->q2[] = array_shift($this->q1);
        }
        $top = array_shift($this->q1);
        $this->q1 = $this->q2;
        $this->q2 = [];
        return $top;
    }

    /**
     * Get the top element.
     * @return Integer
     */
    function top() {
        return end($this->q1);
    }

    /**
     * Returns whether the stack is empty.
     * @return Boolean
     */
    function empty() {
        return empty($this->q1) ? true : false;
    }
}

class MyStack2 {
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->q = [];
    }

    /**
     * Push element x onto stack.
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->q[] = $x;
        $len = count($this->q);
        while ($len > 1) {
            $this->q[] = array_shift($this->q);
            $len--;
        }
    }

    /**
     * Removes the element on top of the stack and returns that element.
     * @return Integer
     */
    function pop() {
        return array_shift($this->q);
    }

    /**
     * Get the top element.
     * @return Integer
     */
    function top() {
        return $this->q[0];
    }

    /**
     * Returns whether the stack is empty.
     * @return Boolean
     */
    function empty() {
        return empty($this->q) ? true : false;
    }
}