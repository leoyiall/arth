<?php 
    header("Content-type:text/html;charset=utf-8");
    function countingSort($arr) {
        $count = count( $arr );
         if( $count <= 1 ) return $arr;
         $min = min($arr);
         $max = max($arr);
         $countArr = array();
         for($i = $min; $i <= $max; $i++)
         {
            $countArr[$i] = 0;
         }
         foreach($arr as $v)
         {
            $countArr[$v] = $countArr[$v] + 1;
         }
         $list = array();
         foreach ($countArr as $k=>$c) 
         {
            for($i = 0; $i < $c; $i++)
            {
                $list[] = $k;
            }
         }
         return $list;
    }
    $arr = array(20,0,39,66,40,78,46,36,60,100);
    echo "排序前:";
    foreach ($arr as $k => $val) {
        echo $val.' ';
    }
    echo "<br>排序后:";
    $arr = countingSort($arr);
    foreach ($arr as $k => $val) {
        echo $val.' ';
    }
?>