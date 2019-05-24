<?php 
    function factorIsOdd($a)
    {
        $total =0;
        for($i=1; $i<=$a; $i++ )
        {
            if($a%$i == 0)
                $total++;
        }
        if($total%2 == 1 )
            return 1;
        else 

            return 0;
    }
    function totalCount($num,$n)
    {
        $count = 0;
        for($i=0; $i<$n; $i++)
        {
            if(factorIsOdd($num[$i]))		//判断因子数是不是奇数，奇数（灯亮）则加1
            {
                printf("亮着的灯的编号是：%d<br>",$num[$i]);
                $count++;
            }
        }
        return $count;
     }

    $num = array();
    for($i=0;$i<100;$i++)
    {
        $num[$i] = $i+1;
    }
    $count = totalCount($num,100);

    printf("最后总共有%d盏灯亮着。<br>",$count);
?>
