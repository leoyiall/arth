<?php 
    for ($sum=100000,$num = 0; $sum >= 5000; ) { 
        if ($sum >= 50000) {
            $sum = 0.95*$sum;
        }else{
            $sum = $sum - 5000;
        }
        $num++;
    }
    echo $num;
?>
