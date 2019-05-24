<?php 
	function minNum($x, $y) 
	{ 
		return ($x<$y) ? $x : $y; 
	}

	function findMin($arr, $low, $high)
	{
		//如果旋转个数为0，即没有旋转，单独处理，直接返回数组头元素
		if ($high<$low)  
			return $arr[0];

		//只剩一个元素一定是最小值
		if ($high == $low)
			return $arr[$low];

		//mid=(low+high)/2，采用下面写法防止溢出
		$mid =$low + (($high - $low) >> 1); 

		// 判断是否arr[mid]为最小值
		if ($arr[$mid] <$arr[$mid - 1])
			return $arr[$mid];
		// 判断是否arr[mid + 1]为最小值
		else if ($arr[$mid + 1] <$arr[$mid])
			return $arr[$mid + 1];
		//最小值一定在数组左半部分
		else if ($arr[$high] >$arr[$mid])
			return findMin($arr, $low, $mid - 1);
		//最小值一定在数组右半部分
		else if($arr[$mid]>$arr[$low])
			return findMin($arr, $mid + 1, $high);
		//arr[low] == arr[mid] && arr[high] == arr[mid]
		//这种情况下无法确定最小值所在的位置，需要在左右两部分分别进行查找
		else
			return minNum(findMin($arr, $low, $mid - 1), findMin($arr, $mid + 1, $high));
	}

	$arr1 = array(5, 6, 1, 2, 3, 4);

	$len1 = count($arr1);
	printf("%d<br>",findMin($arr1, 0, $len1 - 1));

	$arr2 = array(1, 1, 0, 1);
	$len2 = count($arr2);
	printf("%d",findMin($arr2, 0, $len2 - 1));
?>