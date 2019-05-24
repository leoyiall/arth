<?php 
    /* 函数功能：计算一个数d的n次方 */ 
    function power($d, $n)
    {
        if($n==0)return 1;  
        if($n==1)return $d;
        $result=1.0;
        if($n>0)
        {       
            for($i=1;$i<=$n;$i++)
            {
                $result*=$d;
            }
            return $result;
        }
        else
        {
            for($i=1;$i<=abs($n);$i++)
            {
                $result=$result/$d;
            }
        }
        return $result;
    } 

    printf("%0.2f<br>",power(2,3));
    printf("%0.2f<br>",power(-2,3));
    printf("%0.3f",power(2,-3));
?>