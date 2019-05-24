<?php 
    /*
    ** 函数功能：在数组中找唯一重复的元素
    ** 输入参数：array:数组首地址，len数组长度
    ** 返回值：重复元素的值，无重复元素则返回-1
    */
    function findDup($array)
    {
        $len = count($array);
        if(!$array || $len<1)
            return -1;
        $newArr = array();
        for ($i = 0; $i <$len-1; $i++)
            $newArr[$i] = 0;
        for ($i = 0; $i <$len; $i++)

        {
            if ($newArr[$array[$i] - 1] == 0)
            {
               $newArr[$array[$i] - 1] = 1;
            }else
            {
                return $array[$i];
            }
        }
        return -1;
    }
    $array = [1, 3, 4, 2, 5, 3];
    printf("%d",findDup($array));
?>