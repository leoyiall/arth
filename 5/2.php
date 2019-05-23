<?php
	header("content-type:text/html;charset=utf-8");
     class queue {
      private $queueList;
      private $size;
     
      public function __construct() {
        $this->queueList = array();
        $this->size = 0;
      }
     
      // 入队操作
      public function enQueue($data) {
        $this->queueList[$this->size++] = $data;
     
        return $this;
      }

     
       // 出队操作
      public function outQueue() {
        if (!$this->isEmpty()) {
          --$this->size;
          $front = array_splice($this->queueList, 0, 1);
     
          return $front[0];
        }
     
        return false;
      }
     
      // 获取队列
      public function getQueue() {
        return $this->queueList;
      }
     
      // 获取队头元素
      public function getFront() {
        if (!$this->isEmpty()) {
          return $this->queueList[0];
        }
     
        return false;
      }
     // 获取队尾元素
     public function getRear() {
       if (!$this->isEmpty()) {
         $len = count($this->queueList);
         return $this->queueList[$len-1];
       }
     
       return false;
     }
      // 获取队列的长度
      public function getSize() {
        return $this->size;
      }
     
      // 检测队列是否为空
      public function isEmpty() {
        return 0 === $this->size;
      }
    }

    $queue = new queue();
    $queue->enQueue(1);
    $queue->enQueue(2);
    echo "队列头元素为：".$queue->getFront();

    echo "<br>队列尾元素为：".$queue->getRear();
    echo "<br>队列大小为：".$queue->getSize();
?>