<?php 
    //返回0和1的概率都为1/2
    function fun1()
    {   
        return rand(0,1)%2;
    } 

    //返回0的概率为1/4，返回1的概率为3/4
    function fun2()
    {   
        $a1=fun1();
        $a2=fun1();
        $tmp=$a1;
        $tmp|=($a2<<1);
        if($tmp==0)
            return 0;
        else 
            return 1;
    } 
    for($i=0;$i<16;$i++)
        printf("%d ",fun2());
        printf("<br>");
    for($i=0;$i<16;$i++)
        printf("%d ",fun2());
?>
