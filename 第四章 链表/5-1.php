<?php 
    header("content-type:text/html;charset=utf-8");
     //链表结点   
    class node {    
        public $data; 	//存储数据   
        public $next; 	//下一结点   
         
        public function __construct($data) {     
            $this->data = $data;   
            $this->next = NULL;   
        }   
    } 
    //单链表   
    class linkList {   
        private $header;	//链表头结点   
         
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
                if ($current->next->id == $data) {   
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
        /* 把链表右旋k个位置 */
        public function RotateK($k){ 
            $head = $this->header;
            if($head==NULL || $head->next==NULL)
                return ;
            //fast指针先走k步，然后与slow指针同时向后走
            $slow=$fast=$head->next;
            for($i=0; $i<$k && $fast ;++$i){ //前移k步 
                $fast=$fast->next;
            }
            //判断k是否已超出链表长度
            if($i<$k)
                return ;
           //循环结束后slow指向链表倒数第k+1个元素，fast指向链表最后一个元素
            while($fast->next!=NULL){ 
                $slow=$slow->next;
                $fast=$fast->next;
            }
            $tmp=$slow;
            $slow=$slow->next; 
            $tmp->next=NULL;  		//如上图步骤（2）
            $fast->next=$head->next; 	//如上图步骤（3）
            $head->next=$slow;    		//如上图步骤（4）
        }
        

    }
    $lists = new linkList();   
    for($i=1;$i<8;$i++){  
        $lists->addLink ( new node($i) );    
    }  
    echo "旋转前： ";
    $lists->getLinkList();     
    echo "<br>旋转后：";
    $lists->RotateK(3); 
    $lists->getLinkList();
    //释放链表所占的空间  
    $lists->clear();  
?>