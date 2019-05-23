<?php 
    header("content-type:text/html;charset=utf-8");
     //链表结点   
    class node {     
        public $data; //数据存储   
        public $next; //下一结点   
         
        public function __construct($data) {   
            $this->data = $data;   
            $this->next = NULL;   
        }   
    } 
    //单链表   
    class linkList {   
        private $header; //链表头结点   
         
        //构造方法   
        public function __construct($data = NULL) {   
            $this->header = new node ($data);   
        }       
        //添加结点数据   
        public function addLink($node) {   
            $current = $this->header;   
            while ( $current->next != NULL ) {   
                $current = $current->next;   
            }   
            $node->next = $current->next;   
            $current->next = $node;   
        }  

        //删除链表结点   
        public function free($data) {   
            $current = $this->header;   
            $flag = false;   
            while ( $current->next != NULL ) {  
                if ($current->next->data == $data) {   
                    $flag = true;   
                    break;   
                }   
                $current = $current->next;   
            }  
            if ($flag) {   
                $current->next = $current->next->next;   
            } else {   
                echo "未找到data=" . $data . "的结点！<br>";   
            }   
        }  

        //清空链表  
        public function clear(){  
            $this->header = NULL;  
        }   
        
        //获取链表   
        public function getLinkList() {   
            $current = $this->header;   
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

        /*
        ** 函数功能：找出链表倒数第k个结点
        ** 输入参数：k:表示查找倒数第k个结点
        ** 返回值：指向倒数第k个结点的指针
        */
        public function FindLastK($k){ 
            $head = $this->header;
            if($head==NULL || $head->next==NULL)
                return $head;
            $slow = NULL;
            $fast = NULL;
            $slow=$fast=$head->next;
            for($i=0; $i<$k && $fast ;++$i){ //前移k步  
                $fast=$fast->next;
            }
            //判断k是否已超出链表长度
            if($i<$k)
                return NULL;    
            while($fast!=NULL){ 
                $slow=$slow->next;
                $fast=$fast->next;
            }
            return $slow;
        }

    }
    $lists = new linkList();   
    for($i=1;$i<8;$i++){  
        $lists->addLink ( new node($i) );    
    }  
    echo "链表：";
    $lists->getLinkList();     
    echo "<br>链表倒数第3个元素为：";
    $result = $lists->FindLastK(3); 
    echo $result->data;
    //释放链表所占的空间  
    $lists->clear();  
?>