<?php 
    function search($n) 
    {
        $count = 0;
        for ($i = 1;; $i++) 
        {
            if ($i % 2 == 0 || $i % 3 == 0 || $i % 5 == 0)
                $count++;
            if ($count == $n)
                break;
        }
            return $i;
    }
        
    printf("%d",search(1500));
?> 
