<?php 
    header("content-type:text/html;charset=utf-8");
     //链表结点   
    class node {     
        public $data; 				//结点名称   
        public $next; 				//下一结点   
         
        public function __construct($data) {     
            $this->data = $data;   
            $this->next = NULL;   
        }   
    } 
    //单链表   
    class linkList {   
        private $pHead; 			//链表头结点   
        private $pEnd=NULL; 		//链表尾结点   
         
        //构造方法   

        public function __construct($data = NULL) {   
            $this->pHead = new node ( $data );     
        }       
        //添加结点数据   
        public function addLink($node) {   
            $current = $this->pHead;   
            while ( $current->next != NULL ) {     
                $current = $current->next;   
            }   
            $node->next = $current->next;   
            $current->next = $node;  
            $this->pEnd = $node->data; 			//尾元素 
        }  
        
        //获取链表   
        public function getLinkList() {   
            $current = $this->pHead;   
            if ($current->next == NULL) {   
                echo ("链表为空!");   
                return;   
            }   
            while ( $current->next != NULL ) {   
                echo $current->next->data . " ";   
                if ($current->next->next == NULL) {   
                    break;   
                }   
                $current = $current->next;   
            }   
        }   
        /* 返回队列首元素 */
        public function getFront()
        {
            if(!$this->pHead->next->data)
            {
                echo "获取队列首元素失败，队列已经为空<br>";
                return '';
            }
            return $this->pHead->next->data;
        }

        /* 返回队列尾元素 */
        public function getBack()
        {
           if(empty($this->pEnd)){
              echo "获取队列尾元素失败，队列已经为空<br>";
              return '';
           }
           return $this->pEnd;
        }
        //获取链表长度   

        public function getLinkLength() {   
            $i = 0;   
            $current = $this->pHead;   
            while ( $current->next != NULL ) {   
                $i ++;   
                $current = $current->next;   
            }   
            return $i;   
        }   
    }
    $lists = new linkList();   
    $lists->addLink ( new node(1) );    
    $lists->addLink ( new node(2) );             
    if($lists->getFront()){
        echo "队列头元素为：".$lists->getFront()."<br>";
    }
    if($lists->getBack()){
        echo "队列尾元素为：".$lists->getBack()."<br>";
    }
    echo "队列大小为：".$lists->getLinkLength();
?>