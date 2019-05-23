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
      
    }  
    //合并两个链表
    function Merge($head1,$head2){
        if($head1==NULL)
            return $head2;
        if($head2==NULL)
            return $head1;
        $cur1=$head1->next; 	//用来遍历head1的指针
        $cur2=$head2->next; 	//用来遍历head2的指针
        $head=NULL;  		//合并后链表的头结点
        $cur=NULL; 		//合并后的链表在尾结点
        //合并后链表的头结点为第一个结点元素最小的那个链表的头结点
        if($cur1->data > $cur2->data){
            $head=$head2;
            $cur=$cur2;
            $cur2=$cur2->next;
        }else{
            $head=$head1;
            $cur=$cur1;
            $cur1=$cur1->next;
        }
        //每次找链表剩余结点的最小值对应的结点连接到合并后链表的尾部
        while($cur1 && $cur2){
            if($cur1->data < $cur2->data) {
                $cur->next=$cur1;
                $cur=$cur1;
                $cur1=$cur1->next;
            }else{
                $cur->next=$cur2;
                $cur=$cur2;
                $cur2=$cur2->next;
            }
        }
        //当遍历完一个链表后把另外一个链表剩余的结点链接到合并后的链表后面
        if($cur1!=NULL){
            $cur->next=$cur1;
        }
        if($cur2!=NULL){
            $cur->next=$cur2;
        }
        return $head;
    }
    
    $head1 = new linkList();
    $head2 = new linkList();
    $num = 0;
    for($i=1;$i<7;){
        $head1->addLink(new node($i));  
        $num++;
        $i+=2;
    } 
    $num=0;
    for($i=2;$i<7;){
        $head2->addLink(new node($i));  
        $num++;
        $i+=2;
    } 
    echo "head1：";
    $head1->getLinkList();   
    echo "<br>head2： ";
    $head2->getLinkList();   
    echo "<br>合并后的链表：";
    $heads = merge($head1->header,$head2->header);
    for($cur=$heads->next;$cur!=NULL;){
        echo $cur->data." ";
        $cur = $cur->next;
    }
    //释放链表所占的空间  
    $head1->clear();  
    $head2->clear();  
?>