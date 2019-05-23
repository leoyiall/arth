<?php 
    header("Content-type:text/html;charset=utf-8");
    function monkeyKing($n, $m){
        $monkeys = range(1, $n);
        $i=0;
        $k=$n;
        while (count($monkeys)>1) {
            if(($i+1)%$m==0) {
                unset($monkeys[$i]);
            } else {
                array_push($monkeys,$monkeys[$i]);
                unset($monkeys[$i]);
            }
            $i++;
        }
        return current($monkeys);
    }
    $monkey = monkeyKing(5, 2);
    echo "最后当王的猴子编号是:".$monkey;
?>