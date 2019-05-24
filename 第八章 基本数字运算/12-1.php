<?php
	function myXOR($x, $y)
	{
	    return ($x | $y) & (~$x | ~$y);
	}
?>