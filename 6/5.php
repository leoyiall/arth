<?php
	//$root 为根结点  前序遍历（递归方法） 
	public function preOrder($root)
	 {
	     if (!is_null($root)) {
	         echo $root->key . " ";
	         $this->preOrder($root->left);
	         $this->preOrder($root->right);
	     }
	 }
?>