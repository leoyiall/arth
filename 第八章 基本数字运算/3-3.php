<?php 
    function add($n1, $n2)
    {   
        $sum = 0;						//保存不进位相加结果
        $carry = 0;						//保存进位值
        do{         
           $sum = $n1 ^ $n2;  				//异或操作代替不进位相加
           $carry = ($n1 & $n2) << 1;  		//与操作代替计算进位值
           $n1 = $sum;   
           $n2 = $carry;  
        } while ($carry != 0); 				//判断进位值是否为0   
        return $sum;  

    }  
    function sub($a, $b)
    {
        return add($a, add(~$b, 1));
    }

    printf("%d<br>",sub(2,4));
?>