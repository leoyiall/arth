<?php 
   function combinationCount($n)
   {
      $count=0;
      $num1=$n;   					//1最多的个数
      $num2=$n/2; 					//2最多的个数
      $num5=$n/5; 					//5最多的个数
      for($x=0;$x<=$num1;$x++)
         for($y=0;$y<=$num2;$y++)
          for($z=0;$z<=$num5;$z++){
           if($x+2*$y+5*$z==$n) 		//满足条件
            $count++;
          }
      return $count;
   }

    printf("%d\n",combinationCount(100));
?>