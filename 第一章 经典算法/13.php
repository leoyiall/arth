<?php 
    header("Content-type:text/html;charset=utf-8");
    $k=100;
    $sum=100;
    for($i=1;$i<=10;$i++){
        $k/=2;
        $sum+=$k;
    }
    echo "共经过:".$sum."米，第10次反弹高:".$k."米";
?> 