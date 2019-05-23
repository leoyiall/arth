<?php
    $arr = array();
    function push(&$arr,$val){
        $size = count($arr);				//统计数组的长度
        $arr[$size] = $val;
    }
    function pop(&$arr){
        $size = count($arr);				//统计数组的长度
        unset($arr[$size-1]);
    }
    push($arr,'a1'); 					//a1入栈
    push($arr,'a2'); 					//a2入栈
    push($arr,'a3'); 					//a3入栈
    echo "入栈后排序：";
    print_r($arr);
    pop($arr); 						//a3出栈
    echo "<br>出栈后排序：";
    print_r($arr);
?>