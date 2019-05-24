<?php 
    define("PLATFORM",32);
    function isOne($n,$i)
    {
        return $n&(1<<$i);
    }

    function findSingle($arr, $size)
    {
        for($i = 0; $i < PLATFORM; $i++)
        {
            $result1 = $result0 = $count1 = $count0 = 0;
            for($j = 0; $j < $size; $j++)

            {
                if(isOne($arr[$j], $i)){
                    $result1 ^= $arr[$j]; 		//第i位为1的值异或操作
                    $count1++;          	//第i位为1的数字个数
                }else{
                    $result0 ^= $arr[$j]; 		//第i位为0的值异或操作
                    $count0++;          	//第i位为0的值的个数
                }
            }
            /*
            ** bit值为1的子数组元素个数为奇数，且出现一次的数字被分配到bit值为
            ** 0的子数组说明只有一个出现一次的数字被分配到bit值为1的子数组中，
            ** 异或结果就是这个出现一次的数字
            */
            if($count1 %2 == 1 && $result0!=0)
            {
                return $result1;
            }
            //只有一个出现一次的数字被分配到bit值为0的子数组中
            if($count0%2 ==1 && $result1!=0)
            {
                return $result0;
            }
    }
        // 没有找到
        return -1;
    }

    $arr = array(6,3,4,5,9,4,3);
    printf("%d",findSingle($arr, count($arr)));
?>