<?php 
    function getmaxmin($arr, $len, &$max, &$min)
    {
        if(!$arr || $len<1){
            printf("参数不合理");
            return;
        }
        $max = $arr[0];
        $min = $arr[0];

        for ($i = 1; $i<$len; $i++)
        {
            if ($arr[$i] > $max)
            {
                $max = $arr[$i];
            }
            else if ($arr[$i] < $min)
            {
                $min = $arr[$i];
            }
        }
    }

    $arr = array(8,6,5,2,3,9,4,1,7);
    $len = count($arr);
    getmaxmin($arr, $len, $max, $min);
    printf("最大值:%d<br>", $max);
    printf("最小值:%d", $min);
?>
