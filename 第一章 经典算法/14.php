<?php
    for ($i=2; $i < 1000; $i++) { 
        $sum=0;
        for ($k=2; $k <= $i/2; $k++) { 
            if($i%$k == 0){
                $sum += $k;
            }
        }
        if($sum+1 == $i){
            echo $i." ";
        }
    }
?>