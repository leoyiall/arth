<?php 
    /*
    ** 函数功能：用++实现加法操作（限制条件：至少有一个非负数）
    ** 输入参数：a,b都是整数，且有一个非负数
    ** 返回值：  a+b
    */
    function add($a,$b)
    {
        if($a<0 && $b<0)
        {
            printf("无法用++操作实现<br>");
            return -1;
        }
        if($b>=0)

        {
            for ($i=0;$i<$b;$i++)
            {    
                $a++;    
            }
            return $a;
        }
        else
        {
            for ($i=0;$i<$a;$i++)
            {    
                $b++;    
            }
            return $b;
        } 
    }    
    /*
    ** 函数功能：用++实现减法操作（限制条件：被减数大于减数）
    ** 输入参数：a,b都是整数且a>=b
    ** 返回值：  a-b
    */     
    function sub($a,$b)
    { 
        if($a<$b)
        {
            printf("无法用++操作实现<br>");
            return -1;
        }     
        for ($result = 0;$b != $a; $b++, $result++) 
        {          
            ;   
        }    
        return $result;    
    }    
    /*
    ** 函数功能：用++实现乘法操作（限制条件：两个数都为整数）
    ** 输入参数：a,b都是正整数
    ** 返回值：  a*b
    */    
    function multi($a,$b)
    {  
        if($a<=0 || $b<=0)
       {
            printf("无法用++操作实现<br>");
            return -1;
        }
        $result = 0;
        for ($i = 0;$i<$b;$i++)
        {          
            $result = add($result,$a);    

        }    
        return $result;    
    }    
    /*
    ** 函数功能：用++实现除法操作（限制条件：两个数都为整数）
    ** 输入参数：a,b都是正整数
    ** 返回值：  a、b
    */    
    function divid($a,$b)
    {
        if($a<=0 || $b<=0)
        {
            printf("无法用++操作实现<br>");
            return -1;
        }
        $result = 1;    
        $tmpMulti = 0;    
        while (1)
        {    
            $tmpMulti = multi($b,$result);    
            if ($tmpMulti<=$a)
            {    
                $result++;    
            }
            else
            {    
                break;    
            }                
        }    
        return $result-1;    
    }    

    printf("%d<br>",add(2,-4));
    printf("%d<br>",sub(2,-4));
    printf("%d<br>",multi(2,4));
    printf("%d<br>",divid(9,4));
?>