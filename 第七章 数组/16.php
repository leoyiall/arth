<?php 
    function maxCover($a, $n, $L)
    {
      $count = 2;
      $maxCount = 1;                //最长覆盖的点数
      $start;                       //覆盖坐标的起始位置
      $i = 0;
      $j = 1;
      while ($i < $n && $j < $n)
      {
          while (($j < $n) && ($a[$j] - $a[$i] <= $L))
          {
              $j++;
              $count++;
          }
          $j--;
          $count--;
          if ($count>$maxCount)
          {
              $start = $i;
              $maxCount = $count;
          }
          $i++;
          $j++;
      }
      printf("覆盖的坐标点: ");
      for ($i = $start; $i < $start + $maxCount; $i++)
      {
          printf("%d ",$a[$i] );
      }

      echo "<br>";
      return $maxCount;
    }

    $a = array( 1, 3, 7, 8, 10, 11, 12, 13, 15, 16, 17, 19, 25 );
    printf("最长覆盖点数: %d", maxCover($a, 13, 8));
?>