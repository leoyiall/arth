<?php
	//$root 为根结点  后序遍历(递归方法)
	public function backOrder($root)
	{
	    if (!is_null($root)) {
	        $this->backOrder($root->left);

	        $this->backOrder($root->right);
	        echo $root->key . " ";
	    }
	} 
?>