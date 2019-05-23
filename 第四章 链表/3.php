<?php 
    header("content-type:text/html;charset=utf-8");
    //链表结点   
    class node {    
        public $data; 	//存储元素   
        public $next;		//下一结点   
         
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
      
        //获取链表长度   
        public function getLinkLength() {   
            $i = 0;   
            $current = $this->header;   
            while ( $current->next != NULL ) {   
                $i ++;   
                $current = $current->next;   
            }   
            return $i;   
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
            
    }  
    /*
    ** 函数功能：对两个带头结点的单链表所代表的数相加
    ** 输入参数：h1:第一个链表头结点；h2:第二个链表头结点
    ** 返回值：相加后链表的头结点
    */
    function add($h1, $h2){ 
        $h1 = $h1->header;
        $h2 = $h2->header;
        if($h1==NULL || $h1->next==NULL)
            return $h2;
        if($h2==NULL || $h2->next==NULL)
            return $h1;
        $c=0; 			//用来记录进位
        $sum=0;		//用来记录两个结点相加的值
        $p1=$h1->next; 	//用来遍历h1
        $p2=$h2->next; 	//用来遍历h2
        $tmp=NULL;  	//用来指向新创建的存储相加和的结点    
        $resultHead = new linkList();	//相加后链表头结点

        $p=$resultHead; 	//用来指向链表resultHead最后一个结点   
        while($p1 && $p2){
            $tmp=new linkList();
            $sum=$p1->data+$p2->data+$c;
            $tmp->header->data=$sum%10;  //两结点相加和
            $c=$sum/10; 	//进位
            $p->header->next=$tmp;
            $p=$tmp;
            $p1=$p1->next;
            $p2=$p2->next;           
        }
        //链表h2比h1长，接下来只需要考虑h2剩余结点的值
        if($p1==NULL){
            while( $p2){
                $tmp=new linkList();
                $sum=$p2->header->data+$c;
                $tmp->header->data=$sum%10;
                $c=$sum/10;
                $p->header->next=$tmp;
                $p=$tmp;
                $p2=$p2->next;
            }
        }
       
        //链表h1比h2长，接下来只需要考虑h1剩余结点的值
        if($p2==NULL){
            while( $p1){
                $tmp=new linkList();
                $sum=$p1->data+$c;
                $tmp->header->data=$sum%10;
                $c=$sum/10;
                $p->header->next=$tmp;
                $p=$tmp;
                $p1=$p1->next;
            }
        }
        //如果计算完成后还有进位，那么增加新的结点
        if($c==1){
            $tmp=new linkList();
            $tmp->header->data=1;
            $p->header->next=$tmp;
        }
        return $resultHead;
    }

    $head1 = new linkList();   
    $head2 = new linkList();   
    for($i=1;$i<7;$i++){
        $head1->addLink ( new node( $i+2 ) );   
    }
    $num=0;
    for($i=9;$i>4;$i--){
        $head2->addLink ( new node( $i ) );   
        $num++;
    }
    printf("Head1： ");
    print_r($head1->getLinkList());
    printf("<br>Head2： ");
    print_r($head2->getLinkList());
    printf("<br>相加后： ");
    $addResult=add($head1,$head2);
    while ( $addResult->header->next != NULL ) {   
        echo $addResult->header->data . " ";   
        if ($addResult->header->next == NULL) {   
            break;   
        }   
        $addResult = $addResult->header->next;   
    }   
    echo $addResult->header->data;
    //释放链表所占的空间  
    $head1->clear();  
    $head2->clear(); 
?> 