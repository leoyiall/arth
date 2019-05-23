<?php 
    header("Content-type:text/html;charset=utf-8");
    function quickSort(&$arr,$low,$hight) {
        if($low >= $hight){
            return;
        }
        $first = $low;
        $last = $hight;
        $key = $arr[$first];
        while($first < $last){
            while ($first < $last && $arr[$last] >= $key) {
                --$last;
            }
            $arr[$first] = $arr[$last]; 
            while($first < $last && $arr[$first] <= $key){
                ++$first;
            }
            $arr[$last] = $arr[$first];
        }
        $arr[$first] = $key;
        quickSort($arr,$low,($first-1));
        quickSort($arr,($first+1),$hight);
    }
    $arr = array(49, 38, 65, 97, 76, 13, 27, 49);
    echo "排序前:";
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
    echo "<br>排序后:";
    quickSort($arr,0,intval(count($arr)-1));
    foreach ($arr as $k => $val) {
       echo $val.' ';
    }
?>