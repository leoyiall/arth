<?php
     function FindDup($array)
     {
         $len = count($array);
         if(!$array || $len<1)
            return -1;
         $result = 0;
         for ($i = 0; $i <$len; $i++)
            $result ^= $array[$i];
         for ($i = 1; $i <$len; $i++)
            $result ^= $i;
         return $result;
    }
    $array = [1, 3, 4, 2, 5, 3];
    printf("%d",findDup($array));
?>