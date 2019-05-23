<?php 
  /*
  ** 函数功能：对不带头结点的单链删除重复结点
  ** 输入参数：head:指向链表第一个结点
  */
  public function removeDupRecursion($head){ 
    if ($head->next == NULL)   
       return $head;
    $pointer=NULL;
    $cur = $head; 
    //对以head->next为首的子链表删除重复的结点
    $head->next = $this->removeDupRecursion($head->next);
    $pointer = $head->next;
    //找出以head->next为首的子链表中与head结点相同的结点并删除
    while ($pointer != NULL){
        if ($head->data == $pointer->data){
          $cur->next = $pointer->next;
        }else{
          $cur = $cur->next;
       }
       $pointer = $pointer->next;
     }
     return $head;
  }
  // 函数功能：对带头结点的单链表删除重复结点
  public function removeDup(){
     $head = $this->header;
     if($head==NULL)
         return ;
     $head->next=$this->removeDupRecursion($head->next);
  }
?>