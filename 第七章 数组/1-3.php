<?php
	function findDup($array)
	{
	    if(!$array)
	        return -1;
	    $slow = 0;
	    $fast = 0;
	    do 
	    {
	        $fast = $array[$array[$fast]]; 			//fast一次走两步
	        $slow = $array[$slow]; 				//slow一次走一步
	    } while($slow != $fast); 				//找到相遇点

	    $fast=0;
	    do 
	    {
	        $fast = $array[$fast];
	        $slow = $array[$slow]; 
	    }while($slow != $fast);  				//找到入口点
	    return $slow;
	}
?>