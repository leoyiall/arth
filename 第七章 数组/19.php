<?php 
    function bestMatrixChainOrder($p, $i, $j)
    {
        if($i == $j)
            return 0;
        $min = 2147483647;
        $count;

        /* 
        ** 通过把括号放在第一个不同的地方来获取最小的代价
        ** 每个括号内可以递归地使用相同的方法来计算
        */
        for ($k = $i; $k <$j; $k++)
        {
            $count = bestMatrixChainOrder($p, $i, $k) +
                    bestMatrixChainOrder($p, $k+1, $j) +
                    $p[$i-1]*$p[$k]*$p[$j];

            if ($count < $min)
                $min = $count;
        }

        return $min;

    }

    $arr = [1, 5, 2, 4, 6];
    $n = count($arr);
    printf("最少的乘法次数为 %d ",bestMatrixChainOrder($arr, 1, $n-1));
?>