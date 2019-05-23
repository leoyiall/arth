<?php 
    header("Content-type:text/html;charset=utf-8");
    function heapSort($arr) {
        //建堆
        $heapSize = count($arr);
        $temp = array();
        for ($i = floor($heapSize / 2) - 1; $i >= 0; $i--) {
            heapify($arr, $i, $heapSize);
        }

        //堆排序
        for ($j = $heapSize - 1; $j >= 1; $j--) {
            $temp = $arr[0];
            $arr[0] = $arr[$j];
            $arr[$j] = $temp;
            heapify($arr, 0, --$heapSize);
        }
        return $arr;
    }
    /*维护堆的性质
    @param  arr 数组
    @param  x   数组下标
    @param  len 堆大小*/
    function heapify(&$arr, $x, $len) {
        $l = 2 * $x + 1;
        $r = 2 * $x + 2;
        $largest = $x;
        $temp=array();
        if ($l < $len && $arr[$l] > $arr[$largest]) {
            $largest = $l;
        }
        if ($r < $len && $arr[$r] > $arr[$largest]) {
            $largest = $r;
        }
        if ($largest != $x) {
            $temp = $arr[$x];
            $arr[$x] = $arr[$largest];
            $arr[$largest] = $temp;
            heapify($arr, $largest, $len);
        }
    }
    $arr = array(20,0,39,66,40,78,46,36,60,100);
    echo "排序前:";
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
    echo "<br>排序后:";
    $arr = heapSort($arr);
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
?>