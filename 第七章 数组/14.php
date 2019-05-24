<?php 
    function rightShift(&$arr, $len, $k)
    {
        if(!$arr || $len<1)
        {
            printf("参数不合法");
            return;
        }
        while ($k--)
        {
            $tmp = $arr[$len - 1];
            for ($i = $len - 1; $i > 0; $i--)
                $arr[$i] = $arr[$i - 1];
            $arr[0] = $tmp;
        }
    }

    $k = 4;
    $arr = array( 1, 2, 3, 4, 5, 6, 7, 8);
    $len = count($arr);
    rightShift($arr, $len, $k);
    for ($i = 0; $i < $len; $i++)
        printf("%d ",$arr[$i]);
?>