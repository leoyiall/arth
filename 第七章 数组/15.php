<?php 
    function findWithBinary($array,$rows,$columns, $data)
    {
      if (!$array || $rows<1 || $columns<1)
          return false;
      //从二维数组右上角元素开始遍历
      $i = 0;
      $j = $columns - 1;
      while ($i< $rows && $j >= 0)
      {   
          //在数组中找到data，返回
          if ($array[$i][$j] == $data)
          {
              return true;
          }
          //当前遍历到数组中的值大于data,data肯定不在这一列中
          else if ($array[$i][$j] > $data)
              --$j;
          //当前遍历到数组中的值小于data，data肯定不在这一行中
          else
              ++$i;
      }
      return false;
    }

    $array = [
      [ 0, 1, 2, 3, 4 ],
      [ 10, 11, 12, 13, 14 ],
      [ 20, 21, 22, 23, 24 ],
      [ 30, 31, 32, 33, 34 ],
      [ 40, 41, 42, 43, 44 ]
    ];
    printf("%d<br>",findWithBinary($array, 5, 5, 17));
    printf("%d",findWithBinary($array, 5, 5, 14));
?>