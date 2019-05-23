<?php 
    header("Content-type:text/html;charset=utf-8");
    define("BLUE",'b'); 
    define("WHITE",'w');
    define("RED",'r'); 
    function SWAP($x, $y,&$color) { 
        $temp = $color[$x]; 
        $color[$x] = $color[$y]; 
        $color[$y] = $temp; 
    }
    $color = array('r', 'b', 'r', 'w', 'r','r', 'w', 'b', 'b', 'r'); 
    $wFlag = 0;
    $bFlag = 0;
    $rFlag = count($color) - 1; 

    echo "旗子开始的排序：";
    for($i = 0; $i < count($color); $i++) 
        echo $color[$i];
    echo "<br>"; 

    while($wFlag <= $rFlag) {
        if($color[$wFlag] == WHITE)
            $wFlag++;
        else if($color[$wFlag] == BLUE) {
            SWAP($bFlag, $wFlag,$color);
            $bFlag++; 
            $wFlag++;
        } 
        else { 
            while($wFlag < $rFlag && $color[$rFlag] == RED)
              $rFlag--;
            SWAP($rFlag, $wFlag,$color);
            $rFlag--;
        } 
    } 
    echo "排序后的旗子：";
    for($i = 0; $i < count($color); $i++) 
        echo $color[$i]; 
    echo "<br>"; 
?>  