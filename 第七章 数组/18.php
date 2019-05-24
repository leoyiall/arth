<?php 
    function calculate(&$a, &$b, $N)
    {
        $b[0] = 1;
        for ($i = 1; $i <$N; ++$i)
        {
            $b[$i] = $b[$i - 1] * $a[$i - 1]; 			//正向计算乘积
        }
        $b[0] = $a[$N - 1];
        for ($i = $N - 2; $i >= 1; --$i)
        {
            $b[$i] *= $b[0];
            $b[0] *= $a[$i];    					//逆向计算乘积
        }
    }

    $N = 10;
    $a = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ];
    $b=array();
    calculate($a, $b, $N);
    for ($i = 0; $i <$N; $i++)
    {
        printf("%d ",$b[$i]);
    }
?>