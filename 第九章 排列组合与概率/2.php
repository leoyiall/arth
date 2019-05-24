<?php 
    /*

    ** 函数功能：求和为n的所有整数组合
    ** 输入参数：sum正整数，result存储组合结果,count记录组合中数字的个数
    */
    function getAllCombination($sum,$result, $count) 
    {  
        if ($sum < 0)  
            return;   
        //数字的组合满足和为sum的条件，打印出所有组合
        if ($sum == 0) 
        { 
            printf("满足条件的组合：");
            for ($i = 0; $i < $count; $i++)  
                printf("%d ",$result[$i] );  
            printf("<br>");  
            return;  
        }  
        
        //打印debug信息，为了便于理解
        printf("----当前组合：");
        for ($i = 0; $i < $count; $i++)  
            printf("%d ",$result[$i] ); 
        printf("----<br>");
        //确定组合中下一个取值
        $i = ($count == 0 ? 1 : $result[$count - 1]);    
        //打印debug信息，为了便于理解
        printf("---i=%d count=%d---<br>",$i,$count);
        for (; $i <= $sum;)
        {  
            $result[$count++] = $i;  
            getAllCombination($sum - $i, $result, $count); 		//求和为sum-i的组合
            $count--;   		//递归完成后，去掉最后一个组合的数字
            $i++;       		//找下一个数字作为组合中的数字
        }   
    }  

    /* 函数功能：找出和为n的所有整数的组合 */
    function showAllCombination($n)
    {
        if($n<1)
        {
            printf("参数不满足要求<br>");
            return;
        }
        $result =array(); 		//存储和为n的组合方式
        getAllCombination($n, $result,0);
    }

    showAllCombination(4);  
?>