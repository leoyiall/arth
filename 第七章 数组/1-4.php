<?php 
    function FindRepeat($array, $len, $num)
    {
        $newArr = array();
        if(NULL==$array || $len<1 || $num<1 || $len<=$num)
            return $newArr;
        
        $index = $array[0];
        $num=$num-1;
        while (true)
        {
            if ($array[$index]<0)
            {
                $num--;
               /* 
               ** 找到了重复的数字index，为了保证能遍历数组中所有的数，把index
               ** 下标对应的值修改为尽可能接近N+M的数
               */
                $array[$index] = $len - $num;
                array_push($newArr,$index);
            }
            if ($num == 0)
            {
                return array_unique($newArr);
            }
            $array[$index] *= -1;
            $index = $array[$index] * (-1) ;
        }
    }


    $array = array(1,2,3,3,3,4,5,5,5,5,6);
    $length = count($array);
    $num = 6;
    $newArr = FindRepeat($array, $length, $num);
    foreach ($newArr as $key => $value) {
        echo $value." ";
    }
?>