<?php 
    function maxSubArray($arr) {    
        $n = count($arr);
        $ThisSum=0;
        $MaxSum=0;    
        for($i=0;$i<$n;$i++){  
            for($j=$i;$j<$n;$j++) {    
                $ThisSum=0;    
                for($k=$i;$k<$j;$k++)    
                    $ThisSum+=$arr[$k];    
                if($ThisSum>$MaxSum)    
                    $MaxSum=$ThisSum;    
            }  
        }  
        return $MaxSum;    
    }    

    $arr =array(1, -2, 4, 8, -4, 7, -1, -5);
    printf("连续最大和为：%d",maxSubArray($arr));
?>