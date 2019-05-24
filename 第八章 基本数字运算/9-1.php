<?php
	function countOne($n)
	{    
	    $count =0 ; 						//用来计数
	    while ($n >0) 
	    {
	        if($n!=0) 					//判断最后一位是否为1
	            $n=$n&($n-1);
	        $count++ ; 
	    }
	    return $count ;
	}  
?>