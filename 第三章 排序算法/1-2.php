<?php
    header("Content-type:text/html;charset=utf-8"); 
    function maopao3($arr){
        $low = 0;
        $high= count($arr)-1; 				//设置变量的初始值
        while ($low < $high) {
            for ($j = $low; $j < $high; ++$j){ 	//正向冒泡，找到最大者
                if ($arr[$j] > $arr[$j+1]) {
                    $tmp = $arr[$j]; 
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $tmp;
                }
            }
            --$high;                 		//修改high值, 前移一位
            for ($j = $high; $j > $low; --$j){ 	//反向冒泡，找到最小者
                if ($arr[$j] < $arr[$j-1]) {
                    $tmp = $arr[$j]; 
                    $arr[$j] = $arr[$j-1];
                    $arr[$j-1] = $tmp;
                }
            }
            ++$low;                  		//修改low值，后移一位
        }
        return $arr;
    }
    $arr = array(36, 25, 48, 12, 25, 65, 43, 57);
    echo "排序前:";
    foreach ($arr as $k => $val) {
      echo $val.' ';
    }
    echo "<br>排序后:";
    $arr = maopao3($arr);
    foreach ($arr as $k => $val) {
      echo $val.' ';
    }
?>