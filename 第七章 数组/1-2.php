<?php
	function findDup($array)
	{
	    $len = count($array);
	    if(NULL==$array || $len<1)
	        return -1;
	    $index = 0;
	    for ($i = 0; $i <$len; $i++)
	    {
	        //数组中的元素的值只能小于len，否则会越界
	        if($array[$i]>=$len)
	            return -1;
	        if ($array[$index]<0)
	            break;
	        //访问过，通过变相反数的方法进行标记
	        $array[$index] *= -1; 
	        //index的后继为array[index]
	        $index = -1*$array[$index];
	    }
	    return $index;
	}  
?>