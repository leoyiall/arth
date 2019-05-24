<?php
    header("Content-type:text/html;charset=utf-8");
    class Node{

        public $key,$left,$right;
        public function __construct($key)
        {
            $this->key = $key;
        }
    }

    class BinaryTree{
        public $root;
        public $sortArr = [];
        // 插入结点
        public function insertNode($node,$newNode){
            if ($node->key < $newNode->key){
                // 如果父结点小于子结点,插到右边
                if (empty($node->right)){
                    $node->right = $newNode;
                }else{
                    $this->insertNode($node->right,$newNode);
                }
            }elseif ($node->key > $newNode->key){
                // 如果父结点大于子结点,插到左边
                if (empty($node->left)){
                    $node->left = $newNode;
                }else{
                    $this->insertNode($node->left,$newNode);
                }
            }
        }
        public function insert($key){
            $newNode = new Node($key);
            if (empty($this->root)){
                $this->root = $newNode;
            }else{
                $this->insertNode($this->root,$newNode);
            }
        }
        // 寻找最小值
        public function findMin(){
            //不断的找它的左子树,直到这个左子树的结点为叶子结点.
            if(!empty($this->root)){
                $this->findMinNode($this->root);
            }
        }
        public function findMinNode(Node $node){
            if (!empty($node->left)){
                $this->findMinNode($node->left);
            }else{
                echo '这个二叉树的最小值为:'.$node->key;
            }
        }

        // 寻找最大值
        public function findMax(){
            if(!empty($this->root)){
                $this->findMaxNode($this->root);
            }
        }
        public function findMaxNode(Node $node){
            if (!empty($node->right)){
                $this->findMaxNode($node->right);
            }else{
                echo '这个二叉树的最大值为:'.$node->key;
            }
        }
    }

    $tree = new BinaryTree();
    $nodes = array(8,3,10,1,6,14,4,7,13);
    echo "二叉树的结构：";
    foreach ($nodes as $value){
        $tree->insert($value);
        echo $value." ";
    }
    echo "<br>";
    $tree->findMin();
    echo "<br>";
    $tree->findMax();
?>
