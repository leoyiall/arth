<?php
	function combinationCount($n)
	{
	    $count=0;
	    for($m=0;$m<=$n;$m+=5)
	    {
	      $count+=floor(($m+2)/2);
	    }
	    return $count;
	}
?>