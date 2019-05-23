<?php  
    header("content-type:text/html;charset=utf-8");
    class LNode{  
        public $mElem;  
        public $mNext;  
        public function __construct(){  
            $this->mElem=NULL;  
            $this->mNext=NULL;  
        }  
    }  
    class StackLinked{  
        //头“指针”，指向栈顶元素  
        public $mNext;  
        public $mLength;  
       
        //初始化栈 
        public function __construct(){  
            $this->mNext=NULL;  
            $this->mLength=0;  
        }  
      
        /** 
         *判断栈是否为空栈 
         *@return boolean  如果为空栈返回true,否则返回false 
         */  
        public function getIsEmpty(){  
            if($this->mNext==NULL){  

                return true;  
            }else{  
                return false;  
            }  
        }  
      
        /** 
         *将所有元素出栈 
         *@return array 返回所有栈内元素 
         */  
        public function getAllPopStack(){  
            $e=array();  
            if(!$this->getIsEmpty()){   
                while($this->mNext!=NULL){  
                    $e[]=$this->mNext->mElem;  
                    $this->mNext=$this->mNext->mNext;  
                }  
            }  
            $this->mLength=0;  
            return $e;  
        }  
      
         //返回栈内元素个数   
        public  function getLength(){  
            return $this->mLength;  
        }  
      
        /** 
         *元素进栈 
         * 
         *@param mixed $e 进栈元素值 
         *@return  boolean 进栈成功返回true 
         **/  
        public function push($e){  
            $newLn=new LNode();  
            $newLn->mElem=$e;  
            $newLn->mNext=$this->mNext;  
            $this->mNext=&$newLn;  
            $this->mLength++;  
            return true;
        }  
      
        /** 
         *元素出栈 
         *@return boolean 出栈成功返回true,否则返回false 
         **/  
        public function pop(){  
            if($this->getIsEmpty()){  
                return false;  
            }  

            $p=$this->mNext;  
            $e=$p->mElem;  
            $this->mNext=$p->mNext;  
            $this->mLength--; 
            return true;
        }  
      
        /** 
         *仅返回栈内所有元素 
         *@return array 栈内所有元素组成的一个数组 
         */  
        public function getAllElem(){  
            $sldata=array();  
            if(!$this->getIsEmpty()){  
                $p=$this->mNext;  
                while($p!=NULL){  
                    $sldata[]=$p->mElem;  
                    $p=$p->mNext;  
                }  
                return $sldata;  
            }  
        }  
        /*
        *  返回栈顶元素
        * @return $element 返回栈顶元素 
        */
        public function top()
        {
            if($this->getIsEmpty()){  
                return false;  
            }  
            $list = $this->getAllElem();
            $element = $list[0];
            return $element;
        }       
    }  
    //根据入栈序列判断出栈后和另一个的出栈序列是否相等
    function isPopSerial($push, $pop){
        if($push->getIsEmpty() || $pop->getIsEmpty())
            return false;
        $pushLen=$push->getLength();
        $popLen=$pop->getLength();
        if($pushLen!=$popLen)
            return false;
        $pushIndex=0;
        $popIndex=0;
        $stack = new StackLinked();  
        $pushList = $push->getAllElem();
        $popList = $pop->getAllElem();
        while($pushIndex < $pushLen)

        {
            //把push序列依次入栈，直到栈顶元素等于pop序列的第一个元素
            $stack->push($pushList[$pushIndex]);
            $pushIndex++;
            //栈顶元素出栈，pop序列移动到下一个元素
            while(!$stack->getIsEmpty()&&$stack->top() == $popList[$popIndex])
            {
                $stack->pop();
                $popIndex++;
            }
        }
        $list = $stack->getAllElem();
        //栈为空，且pop序列中元素都被遍历过
        if( $stack->getIsEmpty() && $popIndex==$popLen)
            return true;
        return false;
    }
    $stackPUSH = new StackLinked();
    $stackPOP = new StackLinked();
    $push = '';
    for($i=1;$i<=5;$i++){
        $stackPUSH->push($i); 
        $push .= $i;
    }
    $pop = '52143';
    $stackPOP->push(5);  
    $stackPOP->push(2);
    $stackPOP->push(1); 
    $stackPOP->push(4);
    $stackPOP->push(3);     
    
    if(isPopSerial($stackPUSH,$stackPOP)){
       echo $pop." 是 ".$push." 的一个pop序列";
    } else{
       echo $pop." 不是 ".$push." 的一个pop序列";
}
?>