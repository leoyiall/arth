<?php 
    function zeroCount($n)
    {
        $count = 0;  
        while($n > 0) 
        {  
            $n = floor($n/5);  
            $count += $n;  
        }  
        return $count;  
    } 
        
    printf("1024!末尾0的个数为：%d<br>",zeroCount(1024));

?>