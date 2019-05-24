<?php 
    header("content-type:text/html;charset=utf-8");
    $arr1 = array();
    $arr2 = array();

    function push($node){
        global $arr1 ;
        array_push($arr1,$node);
    }
    function pop(){
        global $arr1;
        global $arr2;
        if(!empty($arr2)){
            return array_pop($arr2);
        }else{
            while(!empty($arr1)){
                array_push($arr2, array_pop($arr1));
            }
            return array_pop($arr2);
        }
    }

    push(1);
    push(2);
    echo "队列首元素为：".pop()."";
    echo "<br>队列首元素为：".pop()."";
?>