<?php
	/**
	 * 层次遍历(递归方法)
	 * 由于是按层逐层遍历，因此传递树的层数
	 */
	public function levelOrder($root,$level){
	    if($root == NULL || $level < 1){
	        return;
	    }
	    if($level == 1){
	        echo $root->key.' ';
	        return;
	    }
	    if(!is_null($root->left)){
	        $this->levelOrder($root->left,$level - 1);
	    }
	    if(!is_null($root->right)){
	        $this->levelOrder($root->right,$level - 1);
	    }
	}
	//获取树的深度（层数）
	public function getDepthNode($root){
	    if(is_null($root)){
	        return 0;
	    }
	    $left = $this->getDepthNode($root->left);
	    $right = $this->getDepthNode($root->right);
	    $depth = $left > $right ? $left+1 : $right+1;
	    return $depth;
	}
?>