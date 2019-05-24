<?php 
    function findCommon($ar1, $ar2, $ar3, $n1, $n2, $n3)
    {
        $i = 0;
        $j = 0;
        $k = 0;

        /* 遍历三个数组 */
        while ($i < $n1 && $j < $n2 && $k < $n3)
        {
            /* 找到了公有的元素 */
            if ($ar1[$i] == $ar2[$j] && $ar2[$j] == $ar3[$k])
            {   
                printf("%d ", $ar1[$i]);   
                $i++; $j++; $k++; 
            }
            /* ar[i]不可能是共有的元素 */
            else if ($ar1[$i] < $ar2[$j])
                $i++;
            /* ar2[j]不可能是共有的元素 */
             else if ($ar2[$j] < $ar3[$k])
                 $j++;
            /* ar3[k]不可能是共有的元素 */        
            else
                $k++;
        }
    }

    $ar1 = [2, 5, 12, 20, 45, 85];
    $ar2 = [16, 19, 20, 85, 200];
    $ar3 = [3, 4, 15, 20, 39, 72, 85, 190];
    $n1 = count($ar1);
    $n2 = count($ar2);
    $n3 = count($ar3);
    findCommon($ar1, $ar2, $ar3, $n1, $n2, $n3);
?>