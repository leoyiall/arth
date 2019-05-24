<?php 
    function get2Num($arr)
    {
        $len = count($arr);
        if(!$arr || $len<1)
        {
            printf("参数不合理");
            return;
        }
        
        $i = 0;
        $result = 0;
        $position = 0;
        //计算数组中所有数字异或的结果
        for ($i = 0; $i<$len; $i++)
        {
            $result = $result^$arr[$i];
        }
        $tmpResult = $result;     //临时保存异或结果
        //找出异或结果中其中一个位值为1的位数(如1100，位值为1位数为2和3)
        for ($i=$result; ($i & 1) == 0; $i = $i >> 1)        
        {
            $position++;
        }
        for ($i = 0; $i<$len; $i++)
        {
            /*
                    ** 异或的结果与所有第position位为1的数异或，
                     ** 结果一定是出现一次的两个数中其中一个
                     */
            if (($arr[$i] >> $position) & 1)          
            {
                $result = $result^$arr[$i];
            }
        }
        printf("%d<br>", $result);
        //得到另外一个出现一次的数
        printf("%d", $result^$tmpResult);
    }

    $arr = array(3, 5, 6, 6, 5, 7, 2, 2 );
    get2Num($arr);
?>