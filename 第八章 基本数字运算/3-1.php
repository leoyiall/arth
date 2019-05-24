<?php
    function devide($m, $n, &$result, &$remain)
    {  
        $result = 0;  
        while($m >= $n)
        {      
            $multi = 1;  
            //multi * n>m/2(即2* multi * n >m)时结束循环
            while( $multi * $n <= ($m >> 1) )
           {  
                $multi <<= 1;  
            }  
            $result += $multi; 
            //相减的结果进入下次循环
            $m -= $multi * $n;  
        }  
        $remain=$m;
    }
?>