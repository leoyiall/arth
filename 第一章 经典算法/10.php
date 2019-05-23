<?php
    function bull($n) {
        static $num = 1;
        for($j=1; $j<=$n; $j++){
            if($j>=4 && $j<15) {
                $num++;
                bull($n-$j);
            }
            if($j==20){
                $num--;
            }
        }
        return $num;
    }
    echo bull(8);
?>
