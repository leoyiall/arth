<?php
    header("Content-type:text/html;charset=utf-8");
    //二叉树数组表示
    class BinaryTree{
        private $size;
        private $array=array();
        //创建树并初始化结点
        function __construct($size,$root){
            $this->size=$size;
            for ($i = 0; $i < $size; $i++) {
                $this->array[$i]=$i;
            }
            $this->array[0]=$root;
        }
        //查询结点
        function searchNode($nodeCode){
            if ($nodeCode>=$this->size || $nodeCode<0) {
                return false;
            }else{
                return $this->array[$nodeCode];
            }
        }
        //增加树结点

        function addNode($nodeCode,$place,$nodeValue){
            if($nodeCode<$this->size || $nodeCode<0){
                return false;
            }else {
                //左孩子
                if($place==0) {
                    // 不存在$nodeCode这个结点才对这个结点进行增加
                    if(!isset($this->array[$nodeCode+1])){
                        //新结点才在相应位置补值
                        if($nodeCode>=$this->size){
                            for($i=$this->size; $i < $nodeCode+1; $i++){
                                $this->array[$i]=$i;
                            }
                            $this->size=$nodeCode+1;
                            $this->array[$nodeCode+1]=$nodeValue;
                        }else{
                            $this->array[$nodeCode+1]=$nodeValue;
                        }
                    }else{
                        return false;
                    }
                //右孩子
                }elseif ($place==1) {
                    // 不存在$nodeCode这个结点才对这个结点进行增加
                    if(!isset($this->array[$nodeCode+1])){
                        //新结点才在相应位置补值
                        if($nodeCode >=$this->size){
                            for ($i=$this->size; $i < $nodeCode+1; $i++) {
                                $this->array[$i]=$i;
                            }
                            $this->size=$nodeCode+2;
                            $this->array[$nodeCode+2]=$nodeValue;
                        }else{
                            $this->array[$nodeCode+2]=$nodeValue;
                        }
                    }else{
                        return false;
                    }
                }
            }
        }
        //删除树结点
        function deleteNode($nodeCode){
            if($nodeCode>=$this->size || $nodeCode<0){
                return false;
            }else{
                unset($this->array[$nodeCode]);
            }
        }
        //遍历树

        function showTree(){
            $array = $this->array;
            foreach ($array as $key => $value) {
                echo $value." ";
            }
        }
        //销毁树
        function __destruct(){
            unset($this->array);
        }
    }
    //产生一个以2为根结点，9个子结点的二叉树
    $BinaryTree = new BinaryTree(10,2);
    echo "初始化的二叉树：";
    $BinaryTree->showTree();							//遍历树
    echo "<br>搜索根结点：".$BinaryTree->searchNode(0);		//搜索结点1
    $BinaryTree->addNode(10,1,0); 
    echo "<br>增加0结点后的二叉树：";
    $BinaryTree->showTree();							//遍历树
    $BinaryTree->deleteNode(1);							//删除根结点的下一个结点
    echo "<br>删除根结点下一个结点后的二叉树：";
    $BinaryTree->showTree();							//遍历树
?>
