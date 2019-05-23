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
        public $array = [];
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
        // 判断该树是否是完全二叉树
        public function isPerfectTree($root=NULL){
            if(empty($root)){
                $root = $this->root;
            }
            // 1）只有左子树，则左子树下不能再有结点
            if(!empty($root->left)){
                $this->isPerfectTree($root->left);
                $this->isPerfectTree($root->right);
            }
            // 2）判断的树只有右子树没有左子树，不是完全二叉树
            if(empty($root->left) && !empty($root->right)){
                die("该树不是完全二叉树");
            }
            /*3）判断的树只有左子树，后面遍历到的结点必须是叶子结点
*（即没有子结点的结点）
**/
            if(!empty($root->left) && empty($root->right)){
                if(!empty($root->left->left) || !empty($root->left->right)){
                    die("该树不是完全二叉树");
                }
            }
            // 寻找不符合以上两点规则的二叉树说明是完全二叉树
            if(empty($root->left) && empty($root->right)){
                die("该树是完全二叉树");
            }
        }
    }
    $tree = new BinaryTree();
    // 结点插入
    $nodes = array(9,3,10);
    foreach ($nodes as $value){
        $tree->insert($value);
    }
    $tree->isPerfectTree();
?>