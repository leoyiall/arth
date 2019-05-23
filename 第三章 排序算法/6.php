<?php 
    header("Content-type:text/html;charset=utf-8");
    function shellSort($arr) {
        $len = count($arr);
        $gap = 0;
        while($gap < $len/5) {          //动态定义步长序列
            $gap =$gap*5+1;
        }
        for ($gap; $gap > 0; $gap = floor($gap/5)) {
            for ($i = $gap; $i < $len; $i++) {
                $temp = $arr[$i];
                for ($j = $i-$gap; $j >= 0 && $arr[$j] > $temp; $j-=$gap) {
                    $arr[$j+$gap] = $arr[$j];
                }
                $arr[$j+$gap] = $temp;
            }
        }
        return $arr;
    }
    $arr = array(26, 53, 67, 48, 57, 13, 48, 32, 60, 50);
    echo "排序前:";
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
    echo "<br>排序后:";
    $arr = shellSort($arr);
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
?>