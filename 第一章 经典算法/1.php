<?php
    for ($s = 5; ;$s++){
        if ($s%5 == 1) {
            $l = $s - round($s/5) - 1;      
            if($l % 5 == 1){
                $q = $l - round($l/5) - 1;      
                if($q % 5 == 1){
                    $w = $q - round($q/5) - 1;              
                    if($w % 5 == 1){
                        $x = $w - round($w/5) - 1;                  
                        if($x % 5 == 1){
                            $y = $x - round($x/5) - 1;                      
                            if ($y % 5 == 1) {
                                echo $s;
                                exit;
                            }
                        }
                    }
                }
            }
        }
    }
?>