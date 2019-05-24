<?php  
    header("Content-type:text/html;charset=utf-8");
    function findMin($array, $len) {
      if(!$array || $len<=0){
        printf("输入参数不合理<br>");
        return;
      }
      //数组中没有负数
      if($array[0]>=0)
        return $array[0];
      //数组中没有正数
      if($array[$len-1]<=0)
        return $array[$len-1];  
      $mid = 0;
      $begin = 0;
      $end = $len - 1;
      $absMin = 0;
      //数组中既有正数又有负数
      while (1) {
        $mid = $begin + ($end - $begin) / 2;
        //如果等于0，那么就是绝对值最小的数
        if ($array[$mid] == 0) {
          return 0;
        } // 如果值大于0，正负数的分界点在左侧
        else if ($array[$mid] > 0) {
          //继续在数组的左半部分查找
          if ($array[$mid - 1] > 0)
            $end = $mid - 1;
          else if ($array[$mid - 1] == 0)
            return 0;

          //找到正负数的分界点
          else
            break;
        } // 如果小于0，在数组右半部分查找
        else {
          //在数组有半部分继续查找
          if ($array[$mid + 1] < 0)
            $begin = $mid + 1;
          else if ($array[$mid + 1] == 0)
            return 0;
          //找到正负数的分界点
          else
            break;
        }
      }

      // 获取正负数分界点出绝对值最小的值
      $absMin = abs($array[$mid-1]) < abs($array[$mid+1]) ? $array[$mid-1] : $array[$mid+1];
      return $absMin;
    }

    $arr = [-7, -6, -5, -3, -1, 2, 4];
    $len = count($arr);
    printf("绝对值最小的数为：%d",findMin($arr, $len));
?>  