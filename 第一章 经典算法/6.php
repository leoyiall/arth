<?php 
    define("N",4); 
    $num = array();
    for($i = 1; $i <= N; $i++) 
        $num[$i] = $i; 
    perm($num, 1); 

    function perm($num,$i) { 
        if($i < N) { 
            for($j = $i; $j <= N; $j++) { 
                $tmp = $num[$j]; 
                //旋转该区段最右边数字至最左边 
                for($k = $j; $k > $i; $k--) 
                    $num[$k] = $num[$k-1]; 
                $num[$i] = $tmp; 
                perm($num, $i+1); 
                //还原 
                for($k = $i; $k < $j; $k++) 
                    $num[$k] = $num[$k+1]; 
                $num[$j] = $tmp; 
            } 
        } else {  //显示此次排列 
            for($j = 1; $j <= N; $j++) 
                printf("%d ", $num[$j]); 
            printf("<br>"); 
        } 
    }  
?>
