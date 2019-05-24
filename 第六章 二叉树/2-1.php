<?php 
    header("Content-type:text/html;charset=utf-8");
    class TreeNode{
        public $data;                   //数据域
        public $lchild = NULL;          //左孩子
        public $rchild = NULL;          //右孩子
        public function __construct($data='',$lchild=NULL,$rchild=NULL){
            $this->data = $data;
            $this->lchild = $lchild;
            $this->rchild = $rchild;
        }
    }

    class Tree{
        public $root;
        
        public function __construct($root){
            $this->root = $root;
        }
        
        //树的深度
        public function getDepth(){
            return $this->getMaxDepth($this->root);
        }
        
        public function getMaxDepth($node){
            if(NULL == $node) return 0;
            else{
                $left = $this->getMaxDepth($node->lchild);
                $right = $this->getMaxDepth($node->rchild);
                return max($left,$right)+1;
            }
        }
        
        //得到树的宽度
        public function getMaxWidth(){
            if(NULL == $this->root){
                return 0;
            }
            $queue = array();
            $maxWidth =1;
            array_push($queue,$this->root);
            while(true){
                $len = count($queue);
                if($len == 0){
                    break;
                }
                while($len>0){
                    $temp =array_shift($queue);
                    $len--;
                    if($temp->lchild) array_push($queue,$temp->lchild);
                    if($temp->rchild) array_push($queue,$temp->rchild);
                }
                $maxWidth = max($maxWidth,count($queue));
            }
            return $maxWidth;
        }
        
        //逐层遍历树
        public function printTree(){
            if($this->root == NULL) return false;
            $queue = array();
            $queue[] = $this->root;

            while(count($queue)){ 
                $temp = array_shift($queue);
                echo $temp->data.'--';  
                if($temp->lchild) array_push($queue,$temp->lchild);
                if($temp->rchild) array_push($queue,$temp->rchild);
            }
        }
                
        //中根遍历
        public function midTree(){
            $stack = array();
            $stack[] = $this->root;
            while(count($stack)){
                while($temp = $this->getTop($stack)){
                    array_push($stack,$temp->lchild);
                }
                array_pop($stack);
                if(count($stack)){
                    $p = array_pop($stack);
                    echo $p->data.'----';
                    array_push($stack,$p->rchild);
                    
                }
            }
        }
        
        //先根遍历
        public function firstTree(){
            $stack = array();
            $stack[] = $this->root;
            while(count($stack)){
                if($temp = $this->getTop($stack) ){
                    echo $temp->data.'--';
                    array_push($stack,$temp->lchild);
                }else{
                    array_pop($stack);
                    if(count($stack)){
                        $p = array_pop($stack);
                        array_push($stack,$p->rchild);
                    }
                }
            }
        }
        //得到栈的栈顶元素
        private function getTop($s){
            return $s[count($s)-1];
        }   
    }

    // 构造二叉树结点

    for ($i=0; $i <= 10; $i++) { 
        $name = 'tree_'.$i;
        $$name = new TreeNode($i);
    }
    // 构造二叉树结构
    for ($i=0; $i <= 10; $i++) { 
        // 组装二叉树结构
        switch ($i) {
            case '1':
                $tree_1->lchild = $tree_3;
                $tree_1->rchild = $tree_4;
                break;
            case '2':
                $tree_2->lchild = $tree_5;
                $tree_2->rchild = $tree_6;
                break;
            case '3':
                $tree_3->lchild = $tree_7;
                break;
            case '4':
                $tree_4->lchild = $tree_8;
                break;
            case '5':
                $tree_5->lchild = $tree_9;
                break;
            case '6':
                $tree_6->lchild = $tree_10;
                break;
            default:
                $tree_0->lchild = $tree_1;
                $tree_0->rchild = $tree_2;
        }
    }
        
    $tree = new Tree($tree_0);
    echo "逐层遍历二叉树：";
    $tree->printTree();
    echo "<br>二叉树的深度：";
    echo $tree->getDepth();
    echo "<br>先根遍历二叉树：";
    $tree->firstTree();
?>
