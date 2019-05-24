<?php
    function maxNum($m,$n){
        return $m > $n ? $m : $n;
    }
    function maxSubArray($arr, $n)    {    
        $End = array();

        $All = array();
        $End[$n-1] = $arr[$n-1];
        $All[$n-1] = $arr[$n-1];
        $End[0] = $All[0] = $arr[0];
        for($i = 1; $i < $n; ++$i) {
            $End[$i] = maxNum($End[$i-1]+$arr[$i],$arr[$i]);
            $All[$i] = maxNum($End[$i],$All[$i-1]);
        }
        $maxSum=$All[$n-1]; 
        return $maxSum; 
    }   
?>