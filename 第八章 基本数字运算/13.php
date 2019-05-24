<?php 
    function print_num($n)
    {
        if($n > 0)
        {
            print_num($n-1);
            printf("%d ",  $n);
        }
    }
    print_num(100);
?>