<?php
	function maxNum($m,$n){
	    return $m > $n ? $m : $n;
	}
	function maxSubArray($arr, $n){    
	    $nAll = $arr[0];  					//最大子数组和
	    $nEnd = $arr[0];  				//包含最后一个元素的最大子数组和
	    for($i = 1; $i < $n; ++$i) {
	        $nEnd = maxNum($nEnd+$arr[$i],$arr[$i]);
	        $nAll = maxNum($nEnd,$nAll);
	    }
	    return $nAll; 
	} 
?>