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
        public $header; 	//链表头结点   
         
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
        ** 函数功能：找出环的入口点
        ** 输入参数：meetNode,这个参数是fast与slow指针的相遇点
        ** 返回值： NULL:无环，否则返回slow与fast指针相遇点的指针
        */
        public function FindLoopNode($meetNode){ 
            $head = $this->header;
            $first=$head->next; 
            $second=$meetNode;
            while($first!=$second){
                $first=$first->next;
                $second=$second->next;
            }
            return $first;
        }
    }
    // 构建链表
    function ConstructList(){
        $list=new linkList();
        $cur=$list;  
        //构造第一个链表
        for($i=1;$i<8;$i++){      
            $tmp=new linkList();
            $tmp->header->data=$i;
            $cur->header->next=$tmp;
            $cur=$tmp;
        }

        $cur->header->next=$list->header->next->header->next->header->next;
        return $list->header;
    }   
    /*
    ** 函数功能：判断单链表是否有环
    ** 输入参数：head:链表头结点
    ** 返回值： NULL:无环，否则返回slow与fast指针相遇点的指针
    */
    function isLoop($head){ 
        if($head==NULL || $head->next==NULL)
            return NULL;
        //初始两个指针都指向链表第一个结点
        $slow=$head->next;
        $fast=$head->next;
        while($fast && $fast->header->next){
            $slow=$slow->header->next;
            $fast=$fast->header->next->header->next;
            if($slow==$fast)
                return $slow;        
        }
        return NULL;
    }
    /*
    ** 函数功能：找出环的入口点
    ** 输入参数：head头结点，和meetNode:fast与slow指针相遇点
    ** 返回值： NULL:无环，否则返回slow与fast指针相遇点的指针
    */
    function FindLoopNode($head,$meetNode){ 
        $first=$head->next;
        $second=$meetNode;
        while($first!=$second){
            $first=$first->header->next;
            $second=$second->header->next;
        }
        return $first;
    }
    $head = ConstructList();    
    $meetNode = isLoop($head);
    if($meetNode!=NULL){
        echo "有环";
        $loopNode=FindLoopNode($head,$meetNode);
        echo "<br>环的入口点为：".$loopNode->header->data;
    }else{
        echo "无环";
    }
?>