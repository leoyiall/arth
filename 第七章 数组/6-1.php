<?php 
    function findTop3($arr){
        $len = count($arr);
        if ( !$arr || $len < 3){
            printf("参数不合法\n");
            return;
        }
        $r1 = $arr[0];
        $r2 = $arr[0];
        $r3 = $arr[0];
        for ($i = 0; $i <$len; ++$i){
            if ($arr[$i] > $r1){
                $r3 = $r2;
                $r2 = $r1;
                $r1 = $arr[$i];
            }
            else if ($arr[$i] > $r2 && $arr[$i] != $r1){
                $r3 = $r2;
                $r2 = $arr[$i];
            }
            else if ($arr[$i] > $r3  && $arr[$i] != $r2){
                $r3 = $arr[$i];
            }
        }
        printf("前三名分别为:%d,%d,%d\n",$r1,$r2,$r3);
    }

    $arr = array(4,7,1,2,3,5,3,6,3,2);
    findTop3($arr);
?>