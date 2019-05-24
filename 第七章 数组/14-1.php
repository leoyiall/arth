<?php
    function rightShift(&$arr, $len, $k)
    {
      if(!$arr || $len<1)
      {
          printf("参数不合法");
          return;
      }
      $k %= $len;
      while ($k--)
      {
          $t = $arr[$len - 1];
          for ($i = $len - 1; $i > 0; $i--)
              $arr[$i] = $arr[$i - 1];
          $arr[0] = $t;
      }
    }
?>