<?php
	function minNum($x, $y) 
	{ 
	    return ($x<$y) ? $x : $y; 
	}

	function minDistance($arr, $num1, $num2){
	    $len = count($arr);
	    if (!$arr || $len <= 0){
	        printf("参数不合理\n");
	        return max($arr);
	    }
	    $lastPos1 = -1; 				//上次遍历到num1的位置
	    $lastPos2 = -1; 				//上次遍历到num2的位置
	    $minDis = max($arr);   		//num1与num2的最小距离
	    for ($i = 0; $i < $len; ++$i){
	        if ($arr[$i] == $num1){
	            $lastPos1 = $i;
	            if ($lastPos2 >= 0)
	                $minDis =minNum($minDis, $lastPos1 - $lastPos2);
	        }

	        if ($arr[$i] == $num2){
	            $lastPos2 = $i;
	            if ($lastPos1 >= 0)
	                $minDis = minNum($minDis, $lastPos2 - $lastPos1);
	        }
	    }
	    return $minDis;
	}
?>