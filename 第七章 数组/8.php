<?php 
    header("content-type:text/html;charset=utf-8");
    function maxCount($a, $b, $c) {
        $max = $a < $b ? $b : $a;
        $max = $max < $c ? $c : $max;
        return $max;
    }

    function getMinDistance($a, $b, $c) {
        $aLen = count($a);
        $bLen = count($b);
        $cLen = count($c);
        $minDist = maxCount(abs($a[0] - $b[0]), 
                   abs($a[0] - $c[0]), abs($b[0] - $c[0]));
        $dist = 0;
        for ($i = 0; $i < $aLen; $i++) {
            for ($j = 0; $j < $bLen; $j++) {

                for ($k = 0; $k < $cLen; $k++) {
                    //求距离
                    $dist = maxCount(abs($a[$i] - $b[$j]), 
                          abs($a[$i] - $c[$k]),abs($b[$j] - $c[$k]));
                    //找出最小距离
                    if ($minDist > $dist) {
                        $minDist = $dist;
                    }
                }
            }
        }
        return $minDist;
    }

    $a = [ 3, 4, 5, 7,15 ];
    $b = [ 10, 12, 14, 16, 17 ];
    $c = [ 20, 21, 23, 24, 37, 30 ];
    printf("最小距离为：%d", getMinDistance($a,$b,$c));
?>