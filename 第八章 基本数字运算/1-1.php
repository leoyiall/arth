<?php
	function isPower($n)
	{
	    if($n<=0)
	    {
	        printf("%d不是自然数<br>",$n);
	        return false;
	    }
	    $low=1;
	    $high=$n;
	    while($low<$high)
	    {
	        $mid=intval(($low+$high)/2);
	        $power=$mid*$mid;
	        //接着在1～mid-1区间查找
	        if($power>$n)
	            $high=$mid-1;
	        //接着在mid+1～n区间内查找
	        else if($power<$n)
	            $low=$mid+1;
	        else
	            return true;

	    }
	    return false;
	}
?>