<?php 
    function getAllSubset($array, $mask, $length, $c)
    {
        if ($length == $c)
        {
            printf("{ ");
            for ($i = 0; $i <$length; $i++)
            {
                if ($mask[$i])
                {
                    echo $array[$i];
                }
            }
            printf("}<br>");
        }
        else
        {
            $mask[$c] = 1;
            getAllSubset($array, $mask, $length, $c + 1);
            $mask[$c] = 0;
            getAllSubset($array, $mask, $length, $c + 1);
        }
    }

    $array = [ 'a', 'b', 'c' ];
    $length = count($array);
    $mask[3] = [ 0 ];
    getAllSubset($array, $mask, $length, 0);
?>