<?php
    public function recursiveReverse(&$firstRef){
        if ($firstRef==NULL) 
            return;  
        $cur='';
        $rest='';  
        $cur = $firstRef;    	//cur: 1→2→3→4→5→6→7
        $rest = $cur->next;   	//rest: 2→3→4→5→6→7
        if ($rest == NULL) 
            return; 
        //逆序rest，逆序后链表： 7→6→5→4→3→2
        $this->recursiveReverse($rest); 
        //把第一个结点添加到尾结点：7→6→5→4→3→2→1
        $cur->next->next = $cur;   
        $cur->next = NULL; 
        //更新逆序后链表第一个结点的指向
        $firstRef = $rest;   
    }

    //函数功能：对带头结点的单链表进行逆序 
    public function reverse(){
        $head = $this->header;
        if ($head == NULL|| $head->next==NULL)  
               return;
        //获取链表第一个结点
        $firstNode=$head->next;
        //对链表进行逆序
        $this->recursiveReverse($firstNode);
        //头结点指向逆序后链表的第一个结点
        $head->next=$firstNode;
    }
?>