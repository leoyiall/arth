<?php 
    for ($i=1; $i < 9; $i++) { 
        for ($j=0; $j <= 9; $j++) { 
            for ($m=0; $m <= 9; $m++) { 
                if(pow($i, 3)+pow($j, 3)+pow($m, 3) == 100*$i+10*$j+$m){
                    echo $i.$j.$m." ";
                }
            }
        }
    }
?>