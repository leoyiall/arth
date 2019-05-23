<?php 
    header("content-type:text/html;charset=utf-8");
    //链表结点   
    class node {   
        public $data; 	//存储数据   
        public $next;		//下一结点   
         
        public function __construct($data) {    
            $this->data = $data;   
            $this->next = NULL;   
        }   
    }  
    //单链表   
    class linkList {   
        private $header; 	//链表头结点  
         
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

        // 函数功能：对单链表进行逆序
        public function reverse(){
            $head = $this->header;
            //判断链表是否为空
            if($head==NULL || $head->next==NULL){
               echo "链表为空";
               return;
            }
            $pre=NULL; 		//前驱结点
            $cur=NULL; 		//当前结点
            $next=NULL;		//后继结点
            //把链表首结点变为尾结点
            $cur=$head->next;
            $next=$cur->next;
            $cur->next=NULL;
            $pre=$cur;
            $cur=$next;
            //使当前遍历到的结点cur指向其前驱结点
            while($cur->next!=NULL){
               $next=$cur->next;
               $cur->next=$pre;
               $pre=$cur;
               $cur=$cur->next; 
               $cur=$next;
            }
            //结点最后一个结点指向倒数第二个结点
            $cur->next=$pre;
            //链表的头结点指向原来链表的尾结点
            $head->next=$cur;
       }
}  

    $lists = new linkList();   
    for($i=1;$i<8;$i++){
        $lists->addLink (new node ($i));   
    }
    echo "逆序前：";
    $lists->getLinkList();   
    $lists->reverse();
    echo "<br>逆序后：";
    $lists->getLinkList();
    //释放链表所占的空间  
    $lists->clear(); 
?>