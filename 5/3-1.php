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
        public static $mLength;  
      
        /** 
        *初始化栈 
        * 
        *@return void 
        */  
        public function __construct(){  
            $this->mNext=NULL;  
            self::$mLength=0;  
        }  
      
        /** 
         *判断栈是否空栈 
         * 
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
         * 
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
            self::$mLength=0;  
            return $e;  
        }  
      
        /** 
         *返回栈内元素个数 
         * 

         *@return int
         */  
        public static function getLength(){  
            return self::$mLength;  
        }  
      
        /** 
         *元素进栈 
         * 
         *@param mixed $e 进栈元素值 
         *@return boolean 进栈成功返回true 
         **/  
        public function push($e){  
            $newLn=new LNode();  
            $newLn->mElem=$e;  
            $newLn->mNext=$this->mNext;  
            $this->mNext=&$newLn;  
            self::$mLength++;  
            return true;
        }  
      
        /** 
         *元素出栈 
         * 
         *@return boolean 出栈成功返回true,否则返回false 
         **/  
        public function pop(){  
            if($this->getIsEmpty()){  
                return false;  
            }  
            $p=$this->mNext;  
            $e=$p->mElem;  
            $this->mNext=$p->mNext;  
            self::$mLength--; 
            return true;
        }  
      
        /** 
         *返回栈内所有元素 
         * 
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
        /*
        ** 函数功能：把栈底元素移动到栈顶
        */
        public function move_bottom_to_top()
        {
            if($this->getIsEmpty())
                return;
            $top1=$this->top();
            $this->pop();
            if(!$this->getIsEmpty())
            {
                $this->move_bottom_to_top();
                $top2=$this->top();
                if($top1>$top2)
                {
                    $this->pop();
                    $this->push($top1);
                    $this->push($top2);
                    return;
                }
            }
            $this->push($top1);
        }

        public function sort_stack()
        {
            if($this->getIsEmpty())
                return;
            //把栈底元素移动到栈顶
            $this->move_bottom_to_top();
            $top=$this->top();
            $this->pop();

            //递归处理子栈
            $this->sort_stack();
            $this->push($top);
        }   
    }  
    
    $stack = new StackLinked();
    $stack->push('1');
    $stack->push('3');
    $stack->push('2');
    $stack->push('4');
    $stack->push('7');
    echo "排序前的出栈顺序为:";
    for($i=0;$i<$stack->getLength();$i++)
    {
        echo $stack->getAllElem()[$i]." ";
    }
    $stack->sort_stack();
    echo "<br>排序后的出栈顺序为:";
    while(!$stack->getIsEmpty())
    {
        echo $stack->top()." ";
        $stack->pop();
    }
?>