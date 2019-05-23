<?php 
    header("Content-type:text/html;charset=utf-8");
    function maopao2($arr) {
        $i = count($arr)-1;  //初始时,最后位置保持不变
        while ( $i > 0) {
            $bool = 0; //每趟开始时,无记录交换
            for ($j = 0; $j < $i; $j++)
                if ($arr[$j] > $arr[$j+1]) {
                    $bool = $j; //记录交换的位置
                    $tmp = $arr[$j]; 
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $tmp;
                }
            $i = $bool; //为下一趟排序作准备
         }
         return $arr;
    }
    $arr = array(36, 25, 48, 12, 25, 65, 43, 57);
    echo "排序前:";
    foreach ($arr as $k => $val) {
      echo $val.' ';
    }
    echo "<br>排序后:";
    $arr = maopao2($arr);
    foreach ($arr as $k => $val) {
      echo $val.' ';
    }
?>