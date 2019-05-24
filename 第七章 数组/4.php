<?php 
	function getnum($arr, $len)

	{
	    if(!$arr || $len<=0)
	    {
	        printf("参数不合理");
	        return -1;
	    }
	    $suma = 0;
	    $sumb = 0;
	    for ($i = 0; $i <$len; $i++)
	    {
	        $suma =$suma+ $arr[$i];
	        $sumb =$sumb+$i;
	    }
	    $sumb=$sumb+$len+$len+1;
	    return $sumb - $suma;
	}

     $arr = array( 1, 4, 3, 2, 7, 5 );
     $len = count($arr);
     printf("%d",getnum($arr,$len));
?>