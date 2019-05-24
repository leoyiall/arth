<?php 
    function maxNum($a,$b){
       return abs($a-$b)==($a-$b)? $a : $b;
    }    

    printf("%d<br>",maxNum(5,6));
?>