<?php
	function maxNum($a,$b){
		return ((((($a)-($b)))&0x80000000)?($b):($a));
	}
?>