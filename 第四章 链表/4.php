<?php 
    header("content-type:text/html;charset=utf-8");
     //链表结点   
    class node {   
        public $data; 	//结点名称   
        public $next; 	//下一结点   
         
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
        ** 函数功能：找出链表head的中间结点，把链表从中间断成两个子链表
        ** 输入参数：head:链表头结点
        ** 返回值：指向链表的中间结点的指针
        */
        public function FindMiddleNode($head){ 
            if($head==NULL || $head->next==NULL)
                return $head;
            $fast = $head;		//快指针每次走两步
            $slow = $head; 	//慢指针每次走一步
            $slowPre=$head;
            //当fast到链表尾时，slow恰好指向链表的中间结点
            while($fast != NULL && $fast->next!=NULL){
                $slowPre=$slow;
                $slow=$slow->next;
                $fast=$fast->next->next;
           }
            //把链表断开成两个独立的子链表
            $slowPre->next=NULL;
            return $slow;
        }

        /*
        ** 函数功能：对不带头结点的单链表翻转
        ** 输入参数：head:指向链表头结点
        */
        public function Reverse($head){
            if($head==NULL || $head->next==NULL)
                return $head;
            $pre=$head; 		//前驱结点
            $cur=$head->next; 	//当前结点
            $next=$cur->next; 	//后继结点
            $pre->next=NULL;
            
            //使当前遍历到的结点cur指向其前驱结点
            while($cur!=NULL){
                $next=$cur->next;
                $cur->next=$pre;
                $pre=$cur;
                $cur=$cur->next;  
                $cur=$next;
            }
            return $pre;
        }
        /*
        ** 函数功能：对链表进行排序
        */
        public function Reorder(){
            $head = $this->header;
            if($head==NULL || $head->next==NULL)
                return;
            //前半部分链表第一个结点
            $cur1=$head->next;
            $mid=$this->FindMiddleNode($head->next);
            //后半部分链表逆序后的第一个结点
            $cur2=$this->Reverse($mid);
            $tmp=NULL;
            //合并两个链表
            while($cur1->next!=NULL){
                $tmp=$cur1->next;
                $cur1->next=$cur2;
                $cur1=$tmp;

                $tmp=$cur2->next;
                $cur2->next=$cur1;
                $cur2=$tmp;
            }
            $cur1->next=$cur2;
        }

    }
    $lists = new linkList();   
    for($i=1;$i<8;$i++){  
        $lists->addLink ( new node($i) );    
    } 
    echo "排序前：";
    $lists->getLinkList ();  
    $lists->Reorder();
    echo "<br> 排序后：";
    $lists->getLinkList();   
    //释放链表所占的空间  
    $lists->clear();  
?>