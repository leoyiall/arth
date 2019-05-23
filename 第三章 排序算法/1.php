<?php
   header("Content-type:text/html;charset=utf-8");
   function maopao($arr)
   {
      $len = count($arr); //计算数组长度
      for ($i = 1; $i < $len; $i++)
      { //该层循环控制需要冒泡的轮数
         for ($k = 0; $k < $len - $i; $k++)
         {
            if ($arr[$k] > $arr[$k + 1])
            {
               $tmp = $arr[$k + 1];
               $arr[$k + 1] = $arr[$k];
               $arr[$k] = $tmp;
            }
         }
      }
      return $arr;
   }

   $arr = array(36, 25, 48, 12, 25, 65, 43, 57);
   echo "排序前:";
   foreach ($arr as $k => $val)
   {
      echo $val . ' ';
   }
   echo "<br>排序后:";
   $arr = maopao($arr);
   foreach ($arr as $k => $val)
   {
      echo $val . ' ';
   }
?>