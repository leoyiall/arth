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

        //函数功能：对带头结点的无序单链表删除重复的结点
        public function removeDup(){
            $head = $this->header;
            if($head==NULL || $head->next==NULL)
                return;
            $outerCur=$head->next; 	//外层循环指针，指向链表第一个结点
            $innerCur=NULL; 		//内存循环用来遍历ourterCur后面的结点
            $innerPre=NULL; 		//innerCur的前驱结点
            $tmp=NULL; 		//用来指向被删除结点的指针
            for(; $outerCur!=NULL; $outerCur=$outerCur->next){
                for($innerCur=$outerCur->next,$innerPre=$outerCur; $innerCur!=NULL;){
                    //找到重复的结点并删除
                    if($outerCur->data == $innerCur->data){
                        $tmp=$innerCur;
                        $innerPre->next=$innerCur->next;
                        $innerCur=$innerCur->next;
                    }else{
                        $innerPre=$innerCur;
                        $innerCur=$innerCur->next;
                    }
                }
            }
        }
    }
    $lists = new linkList();   
    $lists->addLink ( new node(1) );   
    $lists->addLink ( new node(3) );   
    $lists->addLink ( new node(1) );   
    $lists->addLink ( new node(5) );   
    $lists->addLink ( new node(5) );   
    $lists->addLink ( new node(7) );   
    echo "删除重复结点前: ";
    $lists->getLinkList ();   
    echo "<br>删除重复结点后：";
    $lists->removeDup();
    $lists->getLinkList();   
    //释放链表所占的空间  
    $lists->clear();  
?>