<?php 
    header("Content-type:text/html;charset=utf-8");
    for ($i=1; $i <100 ; $i++) { 
        for ($j=1; $j < 100; $j++) { 
            for ($k=3; $k <100 ; $k=$k+3) { 
                if ( ($i+$j+$k == 100)&&($i*5+$j*3+$k/3 == 100) ) {
                    echo "公鸡:".$i,'只，母鸡:',$j,'只，小鸡:',$k,'只<br>';
                }
            }
        }
    }
?>