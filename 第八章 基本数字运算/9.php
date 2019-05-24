<?php
    /*
    ** 函数功能：判断n二进制码中1的个数
    ** 输入参数：n 自然数
    ** 返回值：二进制码中1的个数
    */
    function countOne($n){    
        $count =0 ; 					//用来计数
        while ($n >0){
          if(($n &1) ==1) 				//判断最后一位是否为1
              $count++ ; 
          $n >>=1 ; 					//移位丢掉最后一位
        }
        return $count ;
    }  


    printf("%d<br>",countOne(7));
    printf("%d",countOne(8));
?>
