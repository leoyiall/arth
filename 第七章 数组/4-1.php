<?php
	function getnum($arr, $len)
	{
	    if(!$arr || $len<=0)
	    {
	        printf("参数不合理\n");

	        return -1;
	    }
	    $a = $arr[0];
	    $b = 1;

	    for ($i = 1; $i <$len; $i++)
	    {
	        $a = $a ^ $arr[$i];
	    }

	    for ($i = 2; $i <= $len+1; $i++)
	    {
	        $b = $b ^ $i;
	    }
	    return $a^$b;
	}
	$arr = array( 1, 4, 3, 2, 7, 5 );
     $len = count($arr);
     printf("%d",getnum($arr,$len));
?>