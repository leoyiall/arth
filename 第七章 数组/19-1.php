<?php 
	header("Content-type:text/html;charset=utf-8");
	function bestMatrixChainOrder($p, $n)
	{
	    /* 
	    ** 申请数组来保存中间结果，为了简单m[0][0]没有用
	    ** cost [i,j] = 计算A [i]*A [i + 1] ... *A [j] 
	    ** 所需的标量乘法的最小数量
	    ** 其中A [i]的维数是p [i-1] x p [i]* /
	    */	 	 
	    for ($i=0; $i<$n; $i++){
		    $cost[$i][$i] = 0; 
	    }
	    /* cLen表示矩阵链的长度 */
        for ($cLen=2; $cLen<$n; $cLen++)
        {
            for ($i=1; $i<$n-$cLen+1; $i++)
            {
                $j = $i+$cLen-1;
                $cost[$i][$j] = 100;
                for ($k=$i; $k<=$j-1; $k++)
                {
                    /* 计算乘法运算的代价 */
                    $q = $cost[$i][$k] + $cost[$k+1][$j] + $p[$i-1]*$p[$k]*$p[$j];
                    if ($q < $cost[$i][$j])
                        $cost[$i][$j] = $q;
                }
            }
        }
	    return $cost[1][$n-1];

	}
    $arr = [1, 5, 2, 4, 6];
    $n = count($arr);
    printf("最少的乘法次数为 %d ",bestMatrixChainOrder($arr, $n));
?>
