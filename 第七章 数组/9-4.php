<?php 
    function maxSubArray($arr, $n,&$begin,&$end)    {    
        $maxSum = min($arr); 			//子数组最大值
        $nSum = 0; 					//包含子数组最后一位的最大值
        $nStart=0; 

        for($i = 0; $i < $n; $i++){
            if($nSum < 0){
                $nSum = $arr[$i];
                $nStart=$i;  
            }else {
                $nSum += $arr[$i];
            }
            if($nSum > $maxSum){
                $maxSum = $nSum;
                $begin=$nStart;
                $end=$i;
            }
        }
        return $maxSum;
    }    
    $arr =array(1, -2, 4, 8, -4, 7, -1, -5);
    $len = count($arr);
    printf("连续最大和为：%d<br>",maxSubArray($arr, $len,$begin,$end));
    printf("最大和对应的数组起始与结束坐标分别为：%d,%d",$begin,$end);
?>