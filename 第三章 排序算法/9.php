<?php 
    header("Content-type:text/html;charset=utf-8");
    function bucketSort($arr, $num) {
        if (count($arr) <= 1) {
            return $arr;
        }
        $len = count($arr);
        $buckets = array(0);
        $result = array();
        $min = $max = $arr[0];
        $space=0;
        $n = 0;
        $num=$num||(($num>1&&preg_match("/^[1-9]+[0-9]*$/",$num)) ? $num : 10);
        for ($i = 1; $i < $len; $i++) {
            $min = $min <= $arr[$i] ? $min : $arr[$i];
            $max = $max >= $arr[$i] ? $max : $arr[$i];
        }
        $space = ($max - $min + 1) / $num;
        for ($j = 0; $j < $len; $j++) {
            $index = floor(($arr[$j] - $min) / $space);
            if ($buckets[$index]) {   //  非空桶，插入排序
                $k = count($buckets[$index]) - 1;
                while ($k >= 0 && $buckets[$index][$k] > $arr[$j]) {
                    $buckets[$index][$k + 1] = $buckets[$index][$k];
                    $k--;
                }
                $buckets[$index][$k + 1] = $arr[$j];
            } else {    //空桶，初始化
                $buckets[$index] = [];
                array_push($buckets[$index],$arr[$j]);
            }
        }
        while ($n < $num) {
            $result = array_merge($result,$buckets[$n]);
            $n++;
        }
        return $result;
    }
    $arr = array(20,0,39,66,40,78,46,36,60,100);
        echo "排序前:";
        foreach ($arr as $k => $val) {
            echo $val.' ';
    }
    echo "<br>排序后:";
    $arr = bucketSort($arr,2);
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
?>