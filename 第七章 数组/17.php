<?php
    function swap(&$a, &$b)
    {
      $temp = $a;
      $a    = $b;
      $b    = $temp;
    }

    /* 按照R[i]-O[i]由大到小进行排序 */
    function bubbleSort(&$R, &$O, $len)
    {
      for ($i = 0; $i < $len - 1; ++$i)
      {
        for ($j = $len - 1; $j > $i; --$j)
        {
          if ($R[$j] - $O[$j] > $R[$j - 1] - $O[$j - 1])
          {
            swap($R[$j], $R[$j - 1]);
            swap($O[$j], $O[$j - 1]);
          }
        }
      }
    }

    function schedule(&$R, &$O, $len, $M)
    {
      bubbleSort($R, $O, $len);
      $left = $M;               //剩余可用的空间数
      $i;
      for ($i = 0; $i < $len; $i++)
      {
        if ($left < $R[$i])         //剩余的空间无法继续处理第i个请求
        {
          return false;
        }
        else    //剩余的空间能继续处理第i个请求，处理完成后将占用O[i]个空间
        {
          $left -= $O[$i];
        }
      }

      return true;
    }

    $R = [10,15,23,20,6,9,7,16];
    $O = [2,7,8,4,5,8,6,8];
    $N = 8;

    $M = 50;
    $i;

    $schedueResult = schedule($R, $O, $N, $M);
    if ($schedueResult)
    {
      printf("按照如下请求序列可以完成：\n");
      for ($i = 0; $i < $N; $i++)
      {
        printf("{%d,%d} ", $R[$i], $O[$i]);
      }
    }
    else
    {
      printf("无法完成调度\n");
    }
?>