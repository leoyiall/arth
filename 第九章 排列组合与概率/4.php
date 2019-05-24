<?php 
    function getRandomM(&$a, $n, $m)
    {
        if(!$a || $n<=0 || $n<$m){
            printf("参数不合理\n");
            return;
        }
        for($i=0; $i<$m; ++$i)
        {  
            $j =$i + rand() % ($n-$i) ;			//获取i到n-1间的随机数
            //随机选出的元素放到数组的前面
            $tmp=$a[$i];
            $a[$i]=$a[$j];
            $a[$j]=$tmp; 
        }  
    }  

    $a = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; 
    $n = 10;
    $m = 6;  
    getRandomM($a, $n, $m);  
    for($i=0; $i<$m; ++$i)  
        printf("%d ",$a[$i]);  
?>