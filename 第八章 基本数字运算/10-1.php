<?php
    function power($d, $n) 
    {  
        if($n==0)return 1;  
        if($n==1)return $d;  
        $tmp=power($d,abs($n/2));  
        if($n>0)
        {  
            if($n%2==1)                 //n为奇数
                return $tmp*$tmp*$d;  
            else                        //n为偶数
                return $tmp*$tmp;  
        }else{ 
            if($n%2==1)
                return 1/($tmp*$tmp*$d);  
            else 
                return 1/($tmp*$tmp);  
        }  
    }
?>