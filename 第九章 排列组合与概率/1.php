<?php 
    /*
    ** 函数功能：把数组a看成房间，总共n个房间，判断用指定的策略是否能拿到最多金币
    ** 返回值：如果能拿到返回1，否则返回0
    */
    function getMaxNum($a, $n)
    {
        //随机生成10个房间里金币的个数
        for ($i=0;$i<$n;$i++)
        {
            $a[$i] = rand()%10+1;  			//生成1～10的随机数
        }
        //找出前四个房间中最多的金币个数

        $max4 = 0;
        for ($i=0;$i<4;$i++)
        {
            if ($a[$i]>$max4) $max4 = $a[$i];
        }
        for ($i=4;$i<$n-1;$i++) 
        {
            if ($a[$i]>$max4) 			//能拿到最多的金币
                return 1; 
        }
        return 0; 					//不能拿到最多的金币
    }

    $a = array();
    $monitorCount = 1000;
    $success = 0;
    for ($i=0;$i<$monitorCount;$i++)
    {
        if (getMaxNum($a,10)) $success++;
    }
    printf("%f\n",$success/$monitorCount);  
?>