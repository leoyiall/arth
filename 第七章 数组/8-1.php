<?php
    function maxNum($a, $b, $c) {
      $max = $a < $b ? $b : $a;
      $max = $max < $c ? $c : $max;
      return $max;
    }
    function minNum($a, $b, $c) {
      $min = $a < $b ? $a : $b;
      $min = $min < $c ? $min : $c;
      return $min;
    }

    function getMinDistance($a, $aLen ,$b, $bLen, $c, $cLen) {
      $curDist = 0; 
      $min = 0;
      $minDist = max($a);
      $i=0; 						//数组a的下标
      $j=0; 						//数组b的下标
      $k=0; 						//数组c的下标
      while (1) {
    $curDist = maxNum(abs($a[$i] - $b[$j]), abs($a[$i] - $c[$k]),
            abs($b[$j] - $c[$k]));
        if ($curDist < $minDist)
          $minDist = $curDist;
        //找出当前遍历到三个数组中的最小值
        $min = minNum($a[$i], $b[$j], $c[$k]);
        if ($min == $a[$i]) {
          if (++$i >= $aLen)
            break;
        }
        else if ($min == $b[$j]) {
          if (++$j >= $bLen)
            break;
        }
        else{
          if (++$k >= $cLen)
            break;
        }

      }
      return $minDist;
    }
?>