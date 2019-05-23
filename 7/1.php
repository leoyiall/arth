<?php 
    /* 函数功能：判断一个自然数是否是某个数的二次方 */
    function isPower($n)
    {
        if($n<=0)
        {
            printf("%d不是自然数<br>",$n);
            return false;
        }
        for($i=1;$i<$n;$i++)
        {
            $m=$i*$i;
            if($m==$n)
                return true;
            else if($m>$n)
                return false;
        }
        return false;
    }


    $n1=15;
    $n2=16;
    if(isPower($n1))
        printf("%d是某个自然数的二次方<br>",$n1);
    else
        printf("%d不是某个自然数的二次方<br>",$n1);

    if(isPower($n2))
        printf("%d是某个自然数的二次方<br>",$n2);
    else
        printf("%d不是某个自然数的二次方<br>",$n2);
?>
