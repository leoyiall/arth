<?php 
/* 以arr[low]为基准把数组分成两部分 */
    function partition($arr, $low, $high, &$pos)
    {
        $key = $arr[$low];
        while($low < $high)
        {
            while($low < $high && $arr[$high] > $key){
                $high--;
            }
            $arr[$low] = $arr[$high];
            while($low < $high && $arr[$low] < $key){
                $low++;
            }
            $arr[$high] = $arr[$low];
        }
        $arr[$low] = $key;
        $pos = $low;
    }

    function getMid($arr, $n)
    {
        $low = 0;
        if($n%2 == 0){
          $high = $n;
        }else{

            $high = $n-1;
        }
        $mid = ($low + $high)/2;
        $pos=0;
        while (1)
        {
            /* 以arr[low]为基准把数组分成两部分 */
            partition($arr, $low, $high-1, $pos);
            if ($pos == $mid)  			/*找到中位数*/
                break;
            else if ($pos>$mid) 			/*继续在右半部分查找*/
                $high = $pos - 1;
            else             			/*继续在左半部分查找*/
                $low = $pos + 1;
        }
        /*如果数组长度是奇数，中位数为中间的元素，否则就是中间两个数的平均值*/
        return ($n%2) != 0 ? $arr[$mid] : ($arr[$mid] + $arr[$mid + 1]) / 2;
    }

    $arr = array(7, 5, 3, 1, 11, 9);
    $length = count($arr);
    printf("%d",getMid($arr, $length));
?>