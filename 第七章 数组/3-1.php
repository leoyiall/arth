<?php 
    function swap(&$arr, $low, $high)
    {
        //交换数组low到high的内容
        for ($i=0; $low<$high; $low++, $high--)
        {
            $tmp = $arr[$low];
            $arr[$low] = $arr[$high];
            $arr[$high] = $tmp;
        }
    }

    function rotatearr(&$arr, $len, $div)
    {
        if(!$arr || $len<1 || $div<0 || $div>=$len)
        {
            printf("参数不合法\n");
            return;
        }
        //不需要旋转
        if($div==0 || $div== $len-1)
            return;
                 //交换第一个子数组的内容
        swap($arr, 0, $div);
        //交换第二个子数组的内容
        swap($arr, $div + 1, $len - 1);
        //交换整个数组的元素
        swap($arr, 0, $len - 1);
    }

    $arr = array(1, 2, 3, 4, 5);
    $length = count($arr);
    rotatearr($arr, $length, 2);
    for($i = 0; $i<$length; $i++)
        printf("%d ", $arr[$i]);
?>