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
        private $header; 	//链表头结点   
         
        //构造方法   
        public function __construct($data = NULL) {   
            $this->header = new node ($data );   
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
       ** 函数功能：把链表相邻元素翻转
       */
       public function Reverse2()  {
            $head = $this->header;
           //判断链表是否为空
           if($head==NULL || $head->next==NULL)
               return;
           $cur=$head->next;  			//当前遍历结点
           $pre=$head;    			//当前结点的前驱结点
           $next=NULL;  			//当前结点后继结点的后继结点
           while($cur&&$cur->next) {  
               $next=$cur->next->next; 	//见上图（1）
               $pre->next=$cur->next;   	//见上图（2）
               $cur->next->next=$cur;   	//见上图（3）
               $cur->next=$next;      	//见上图（4）   
               $pre=$cur;            	//见上图（5）
               $cur=$next;           	//见上图（6）
           }   
       }       
    }
    $lists = new linkList();   
    for($i=1;$i<8;$i++){  
        $lists->addLink ( new node($i) );    
    }  
    echo "顺序输出：";
    $lists->getLinkList();     
    echo "<br>逆序输出：";
    $lists->Reverse2(); 
    $lists->getLinkList();
    //释放链表所占的空间  
    $lists->clear();  
?>