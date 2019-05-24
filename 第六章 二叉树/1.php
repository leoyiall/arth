<?php 
	class BinaryTree {
	    protected $key = NULL;      		// 当前结点的值
	    protected $left = NULL;     			// 左子树
	    protected $right = NULL;    			// 右子树
	    /*** 构造二叉树
	    * @param mixed $key 结点的值.
	    * @param mixed $left 左子树结点.
	    * @param mixed $right 右子树结点.
	    */
	    public function __construct( $key = NULL, $left = NULL, $right = NULL) {

	       $this->key = $key;
	        if ($key === NULL) {
	            $this->left = NULL;
	            $this->right = NULL;
	        }elseif ($left === NULL) {
	            $this->left = new BinaryTree();
	            $this->right = new BinaryTree();
	        }else {
	            $this->left = $left;
	            $this->right = $right;
	        }
	    }
	}
?>