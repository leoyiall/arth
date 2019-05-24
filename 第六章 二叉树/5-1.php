<?php
	//$root 为根结点 中序遍历(递归方法)
	public function midOrder($root)
	{
	    if (!is_null($root)) {
	        $this->midOrder($root->left);
	        echo $root->key . " ";
	        $this->midOrder($root->right);
	    }
	} 
?>