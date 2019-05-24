<?php
    /* 获取n的平方根,e为精度要求 */
    function squareRoot($n,$e)
    {
        $new_one = $n;
        $last_one = 1; /* 第一个近似值为1 */
        while($new_one - $last_one > $e) /* 直到满足精度要求为止 */
        {
            $new_one = ($new_one + $last_one)/2; //求下一个近似值
            $last_one = $n/$new_one;
        }
        return $new_one;
    }

    $n = 50;
    $e = 0.000001;
    printf ("%d的算术平方根为%f<br>", $n, squareRoot($n,$e));
    $n=4;
    printf ("%d的算术平方根为%f<br>", $n, squareRoot($n,$e));
?>