<?php 
    //产生的随机数是整数1～7的均匀分布
    function rand7()
    {
        return rand()%7+1;
    }
    //产生的随机数是整数1～10的均匀分布
    function rand10()
    {
        $x = 0;
        do
        {
            $x= (rand7()-1)*7 + rand7();
        } while ($x>40);
        return $x%10+1;
    }


    for($i = 0; $i != 10; ++$i)  
        printf("%d ",rand10());  
?>