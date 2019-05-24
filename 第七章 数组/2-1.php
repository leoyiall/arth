<?php
    function getmaxmin($arr, $len, &$max, &$min)
    {
        if(!$arr || $len<1){

            printf("参数不合理");
            return;
        }

        $max = $arr[0];
        $min = $arr[0];
        //两两分组，把较小的数放到左半部分，较大的放到右半部分
        for ($i = 0; $i<$len; $i++)
        {
            if (isset($arr[$i + 1]) and $arr[$i] >$arr[$i + 1])
            {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $tmp;
            }
        }
        //在各个分组的左半部分找最小值
        $min = $arr[0];
        for ($i = 2; $i <$len; $i++)
        {
            if ($arr[$i] < $min)
            {
                $min = $arr[$i];
            }
        }
        //在各个分组的右半部分找最大值
        $max = $arr[1];
        for ($i = 3; $i <$len; $i++)
        {
            if ($arr[$i] > $max)
            {
                $max = $arr[$i];
            }
        }
        //如果数组中元素个数是奇数个，最后一个元素被分为一组，需要特殊处理
        if ($len % 2 ==1 )
        {
            if($max<$arr[$len - 1])
                $max = $arr[$len - 1];
            if($min > $arr[$len-1])
                $min=$arr[$len-1];
        }
    }
    $arr = array(8,6,5,2,3,9,4,1,7);
    $len = count($arr);
    getmaxmin($arr, $len, $max, $min);
    printf("最大值:%d<br>", $max);
    printf("最小值:%d", $min);
?>