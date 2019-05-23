<?php 
    header("Content-type:text/html;charset=utf-8");
    function hanou($n,$x,$y,$z){
        if($n==1){
            echo '移动片 1 从 '.$x.' 到 '.$z."<br>";
        }else{
            hanou($n-1,$x,$z,$y);
            echo '移动片 '.$n.' 从 '.$x.' 到 '.$z."<br>";
            hanou($n-1,$y,$x,$z);
        }     
    }
    hanou(3,'A','B','C');
?>