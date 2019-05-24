<?php
	function divid($a,$b)
	{
	    $neg = ($a > 0) ^ ($b > 0); 				//结果是否为负数
	    //首先对它们绝对值进行除法运算
	    if($a < 0)
	        $a = -$a;
	    if($b < 0)
	        $b = -$b;   
	    $tmpMulti = 0; 
	    $result=1;
	    while (true)

	    {    
	        $tmpMulti = multi($b,$result);    
	        if ($tmpMulti<=$a)
	        {    
	            $result++;    
	        }else
	        {    
	            break;    
	        }                
	    } 
	    if($neg)
	        return add(~($result-1), 1);    
	    else 
	        return $result-1;
	}
?>