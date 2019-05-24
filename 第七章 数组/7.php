<?php 
    function minDistance($arr, $num1, $num2){
        $len=count($arr);
        if(!$arr || $len<=0){
            printf("参数不合理");
            return '';
        }
        $minDis = max($arr);                //num1与num2的最小距离
        $dist=0;
        for($i = 0; $i < $len; ++$i){
            if($arr[$i] == $num1){
                for($j = 0; $j < $len; ++$j){
                    if($arr[$j] == $num2){
                        $dist=abs($i-$j);       //当前遍历的num1与num2的距离
                        if($dist < $minDis)
                            $minDis=$dist;
                    }
                }
            }

        }
        return $minDis;
    }
    $arr=array(4, 5, 6, 4, 7, 4, 6, 4, 7, 8, 5, 6, 4, 3, 10, 8);
    $num1=4;
    $num2=8;
    printf("%d", minDistance($arr,$num1,$num2));
?>