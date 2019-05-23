<?php
    //函数功能：对单链表进行逆序
    public function Reverse(){
        $head = $this->header;
        //判断链表是否为空
        if($head==NULL || $head->next==NULL)
                return;
        $cur=NULL; 	//当前结点
        $next=NULL; 	//后继结点
        $cur=$head->next->next;
        //设置链表第一个结点为尾结点
        $head->next->next=NULL;
        //把遍历到结点插入到头结点的后面
        while($cur!=NULL){
                $next=$cur->next;
                $cur->next=$head->next;
                $head->next=$cur;
                $cur=$next;
        }
    }
?>