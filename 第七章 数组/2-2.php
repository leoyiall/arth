<?php 
    header("content-type:text/html;charset=utf-8");
    function getmaxmin($array,$l,$r,&$max,&$min){
        $m = intval(($l + $r) / 2);             // 求中点
        $lmax;                      // 左半部分最大值
        $lmin;                      // 左半部分最小值
        $rmax;                      // 右半部分最大值
        $rmin;                      // 右半部分最小值
        if ($l == $r)                       // l与r之间只有一个元素
        {
            $max = $array[$l];
            $min = $array[$l];
            return;
        }
        if ($l + 1 == $r)                   // l与r之间只有两个元素
        {
            if(!isset($array[$r])) $r = $r-1;
            if ($array[$l] >= $array[$r])
            {
                $max = $array[$l];
                $min = $array[$r];
            }else{
                $max = $array[$r];
                $min = $array[$l];
            }
            return;
        }
        getmaxmin($array, $l, $m, $lmax, $lmin);        // 递归计算左半部分
        getmaxmin($array, $m + 1, $r, $rmax, $rmin);    // 递归计算右半部分
        $max = ($lmax>$rmax) ? $lmax : $rmax;       // 总的最大值
        $min = ($lmin<$rmin) ? $lmin : $rmin;           // 总的最小值
    }

    $arr = array(8,6,5,2,3,9,4,1,7);
    $len = count($arr);
    getmaxmin($arr, 0, $len, $max, $min);
    printf("最大值:%d<br>", $max);
    printf("最小值:%d<br>", $min);
?>