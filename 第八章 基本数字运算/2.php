<?php 
    /* 函数功能：判断n能否表示成2的n次方 */
    function isPower($n){
        if($n<1) return false;
        $i=1;
        while($i<=$n){
            if($i==$n)
                return true;
            $i<<=1;
        }
        return false;
    }

    $arr=[8,9];
    $len = 2;
    $i;
    for($i=0;$i<$len;$i++)
    {
        if (isPower($arr[$i]))
            printf("%d能表示成2的n次方<br>",$arr[$i]);
        else
            printf("%d不能表示成2的n次方<br>",$arr[$i]);
    }
?>