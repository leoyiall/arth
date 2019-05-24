<?php 
    header("Content-type:text/html;charset=utf-8");
    function findMin($array, $len){
      if(!$array || $len<=0){
        printf("输入参数不合理");
        return;
      }
      $min=$array[0];
      for($i=0;$i<$len;$i++){
        if(abs($array[$i])<abs($min))
          $min=$array[$i];
      }
      return $min;
    }

    $arr = [-10, -5, -2, 7, 15, 50];
    $len = count($arr);
    printf("绝对值最小的数为：%d",findMin($arr, $len));
?>  