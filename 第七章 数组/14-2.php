<?php
    function reverse(&$arr, $start, $end)
    {
        while( $start<$end )
        {
            $temp = $arr[$start];
            $arr[$start] = $arr[$end];
            $arr[$end] = $temp;
            $start++;
            $end--;
        }
    }

    function rightShift(&$arr, $len, $k)
    {
        if(!$arr || $len<1)
        {
            printf("参数不合法");
            return;
        }
        $k %= $len;
        reverse($arr, 0, $len - $k - 1);
        reverse($arr, $len - $k, $len - 1);
        reverse($arr, 0, $len - 1);
    }
?>