<?php
	function isPower($n)
	{
	    if($n<=0)
	   {
	        printf("%d不是自然数<br>",$n);
	        return false;
	    }
	    $minus=1;
	    while($n>0)
	   {
	        $n=$n-$minus;
	        //n是某个数的二次方
	        if($n==0)
	            return true;
	        //n不是某个数的二次方
	        else if($n<0)
	            return false;
	        //每次减数都加2
	        else
	            $minus+=2;
	    }
	    return false;
	}
?>