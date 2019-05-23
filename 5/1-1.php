<?php   
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
	   
	   	//初始化栈  
	    public function __construct(){  
	        $this->mNext=NULL;  
	        self::$mLength=0;  
	    }  
	  
	    /** 
	     *判断栈是否空栈 
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
	        self::$mLength=0;  
	        return $e;  
	    }  
	  
	    /** 
	     *返回栈内元素个数 
	     *@return int 
	     */  
	    public static function getLength(){  
	        return self::$mLength;  
	    }  
	  
	    /** 
	     *元素进栈 
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
	     *@return boolean 出栈成功返回true
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
	     * 返回栈内所有元素 
	     * @return array 栈内所有元素组成的一个数组 
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
	    
    $stack = new StackLinked();
    $stack->push('1');
    $stack->push('2');
    $list = $stack->getAllElem();
    echo '栈顶元素：'.$stack->top()."<br>";
    $stack->pop();
    echo '栈顶元素：'.$stack->top()."<br>";
    if($stack->pop()){
        echo "弹栈成功<br>";
    }
    if($stack->getIsEmpty()){
        echo "栈已经为空<br>";
    }
?>