<?php 
    header("Content-type:text/html;charset=utf-8");
    function insertSort2($arr) {
        for ($i = 1; $i < count($arr); $i++) {
            $key = $arr[$i];
            $left = 0;
            $right = $i - 1;
            while ($left <= $right) {
                $middle = floor(($left + $right) / 2);
                if ($key < $arr[$middle]) {
                    $right = $middle - 1;
                } else {
                    $left = $middle + 1;
                }
            }
            for ($j = $i - 1; $j >= $left; $j--) {
                $arr[$j + 1] = $arr[$j];
            }
            $arr[$left] = $key;
        }
        return $arr;
    }
    $arr = array(38, 65, 97, 76, 13, 27, 49);
    echo "排序前:";
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
    echo "<br>排序后:";
    $arr = insertSort2($arr);
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
?>