<?php 
     header("content-type:text/html;charset=utf-8");
     define("N",41);  			//参与总人数
     define("M",3);  				//每到3自杀一人 

     $man = array(0); 
     $count = 1; 
     $i = 0;
     $pos = -1; 
     $alive = 2; 				//想救的人数

     while($count <= N) { 
         do{ 
             $pos = ($pos+1) % N;  	// 环状处理 
             if(@$man[$pos] == 0) 
                 $i++; 
             if($i == M) {  
                 $i = 0; 
                 break; 
             } 
         } while(1); 
         $man[$pos] = $count; 
         $count++; 
     } 
     //截取出对应最大键值对应的键名
     arsort($man);
     $arr = array_slice($man,0,$alive,true);
     echo "约琴夫排列："; 
     for($i = 0; $i < N; $i++){
         echo " ".$man[$i]; 
     } 
         
     echo "<br>L表示要救的".$alive."个人要放的位置："; 
     for($i = 0; $i < N; $i++) { 
         if(isset($arr[$i]) && $man[$i] == $arr[$i])     echo "L"; 
         else     echo "D"; 
         if(($i+1) % 5 == 0)     echo " "; 
     } 
?>