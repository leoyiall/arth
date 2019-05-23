<?php 
  public function removeDupRecursion(){ 
     $head = $this->header;
     if($head->next == NULL)   
        return $head;
     $cur=$head;
     while ($cur->next){
        if($cur->data == $cur->next->data)   {
          $tmp = $cur->next;
          $cur->next = $cur->next->next; 
        }else{
          $cur = $cur->next; 
        }
     }
     return $head;
  }
?>