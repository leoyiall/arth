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
                $cur=$next;
            }
            return $pre;
        }

        /*
        ** 函数功能：对链表K翻转
        ** 输入参数：K:表示以K个结点为一组进行翻转
        */
        public function ReverseK($k){
            $head = $this->header;
            if($head==NULL || $head->next==NULL || $k<2)
                return ;
            $pre=$head;
            $begin=$head->next;  
            $end=NULL;  
            $pNext=NULL;  
            while($begin!=NULL){
                $end=$begin;
                //对应图中第(1)步，找到从begin开始第K个结点
                for($i=1;$i<$k;$i++){
                    if($end->next!=NULL)
                        $end=$end->next;
                    else  			//剩余结点的个数小于k
                        return;
                }
                $pNext=$end->next; 	//第（2）步
                $end->next=NULL;  	//第（3）步
                $pre->next=$this->Reverse($begin); //第（4）（5）步
                $begin->next=$pNext;  	//第（6）步
                $pre=$begin; 			//第（7）步
                $begin=$pNext;		//第（8）步
                $i=1;
            }
        }  
    }
    $lists = new linkList();   
    for($i=1;$i<8;$i++){      
        $lists->addLink( new node($i) ); 
    }   
    echo "顺序输出：";
    $lists->getLinkList ();   
    echo "<br>逆序输出：";
    $lists->ReverseK(3);
    $lists->getLinkList();   
    //释放链表所占的空间  
    $lists->clear();  
?>