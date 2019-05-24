<?php 
    /*
    ** 函数功能：计算两个自然数的除法
    ** 输入参数：m为被除数，n为除数，res计算结果商的引用，remain为余数的引用
    */
    function devide($m, $n, &$res, &$remain)
    {
        $res = 0;  
        $remain = $m;
        //被除数减除数，直到相减结果小于除数为止
        while($m>$n)
       {
            $m=$m-$n;
            $res+=1;
        }
        $remain=$m;  
    }  

    $m = 14;  
    $n = 4;  
    devide($m,$n, $res,$remain);  // res 为结果，rev为余数
    printf("%d除以%d商为：%d，余数为%d<br>",$m,$n,$res,$remain);
?> 