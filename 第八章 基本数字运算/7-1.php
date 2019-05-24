<?php
	function maxNum($a,$b){
		return (((($a)-($b))&(1<<31))?($b):($a));
	}
?>