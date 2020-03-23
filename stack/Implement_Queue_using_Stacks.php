<?php

class MyQueue {
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->stack1 = [];
        $this->stack2 = [];
    }

    /**
     * Push element x to the back of queue.
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        while (!$this->empty()) {
            $this->stack2[] = array_pop($this->stack1);
        }
        $this->stack1[] = $x;
        while (!empty($this->stack2)) {
            $this->stack1[] = array_pop($this->stack2);
        }
    }

    /**
     * Removes the element from in front of queue and returns that element.
     * @return Integer
     */
    function pop() {
        return array_pop($this->stack1);
    }

    /**
     * Get the front element.
     * @return Integer
     */
    function peek() {
        return end($this->stack1);
    }

    /**
     * Returns whether the queue is empty.
     * @return Boolean
     */
    function empty() {
        return empty($this->stack1) ? true :false;
    }
}

class MyQueue2 {
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->stack1 = [];
        $this->stack2 = [];
    }

    /**
     * Push element x to the back of queue.
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->stack1[] = $x;
    }

    /**
     * Removes the element from in front of queue and returns that element.
     * @return Integer
     */
    function pop() {
        if (empty($this->stack2)) {
            while (!empty($this->stack1)) {
                $this->stack2[] = array_pop($this->stack1);
            }
        }
        return array_pop($this->stack2);
    }

    /**
     * Get the front element.
     * @return Integer
     */
    function peek() {
        if (empty($this->stack2)) {
            while (!empty($this->stack1)) {
                $this->stack2[] = array_pop($this->stack1);
            }
        }
        return end($this->stack2);
    }

    /**
     * Returns whether the queue is empty.
     * @return Boolean
     */
    function empty() {
        return empty($this->stack1) && empty($this->stack2) ? true : false;
    }
}