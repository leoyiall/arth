<?php
	function phoneToBit($phone){
		$bitmap[$phone / (8*4)] |= 1<<($phone%(8*4));  
	}  
?>