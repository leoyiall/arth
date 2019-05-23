<?php 
header("Content-type:text/html;charset=utf-8");
    function mergeSort($arr) {  //采用自上而下的递归方法
        $len = count($arr);
        if($len < 2) {
            return $arr;
        }
        $middle = floor($len / 2);
        $left = array_slice($arr,0,$middle);
        $right = array_slice($arr,$middle);
        return merge(mergeSort($left), mergeSort($right));
    }

    function merge($left, $right)
    {
        $result = array();
        while (count($left) && count($right)) {
            if ($left[0] <= $right[0]) {
                array_push($result,array_shift($left));
            } else {
                array_push($result,array_shift($right));
            }
        }

        while (count($left))
            array_push($result,array_shift($left));
        while (count($right))
            array_push($result,array_shift($right));
        return $result;
    }

    $arr = array(49, 38, 65, 97, 76, 13, 27);
    echo "排序前:";
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
    echo "<br>排序后:";
    $arr = mergeSort($arr);
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
?>