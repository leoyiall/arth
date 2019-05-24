<?php 
    /* 获取x与y的异或的结果 */
    function myXOR($x, $y)
    {
        $res = 0; 
        $xoredBit;
        $i;
        for ($i = 32-1; $i >= 0; $i--)                     
        {

            /* 获取x与y当前的bit值 */
            $b1 = ($x & (1 << $i))>0;
            $b2 = ($y & (1 << $i))>0;

            /* 只有这两位都是1或0的时候结果为0 */
            if ($b1==$b2)
                $xoredBit = 0;
            else 
                $xoredBit = 1;

            $res <<= 1;
            $res |= $xoredBit;
        }
        return $res;
    }

    $x = 3;
    $y = 5;
    printf("%d",myXOR($x, $y));
?>