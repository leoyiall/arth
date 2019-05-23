<?php
	header("content-type:text/html;charset=utf-8");
    class Node {
       public $data = NULL;
       public $min = NULL;
    }
 
	class Min_Stack {
		private $data = array();
		private $top;

		public function __construct(Array $a) {
			$this->top = 0;
			foreach($a as $val) {
			 $this->push($val);
			}
		}

		public function push($i) {
			$node = new Node();
			$node->data = $i;

       /*此处设置每个结点的min值，设置方法为若栈为空，
       *当前元素data则为当前结点的min。
       *若栈非空，则当前元素data与前一个结点的min值比较，
       *取其小者作为当前结点的min
       */
       if ($this->top == 0) {
           $min = $node->data;

        } else {
           $min = $this->data[$this->top - 1]->min < $node->data 
        ? $this->data[$this->top - 1]->min : $node->data;
        }

            $node->min = $min;
            $this->data[] = $node;
            $this->top++;
            return $node;
        }

        public function pop() {
            $r = $this->data[--$this->top];
            unset($this->data[$this->top]);
            return $r;
        }

        public function get_min() {
            return $this->data[$this->top - 1]->min;
        }
    }

    $a = array(5);
    $min_stack = new Min_Stack($a);
    echo "栈中最小值为：".$min_stack->get_min();
    $min_stack->push(6);
    echo "<br>栈中最小值为：".$min_stack->get_min();
    $min_stack->push(2);
    echo "<br>栈中最小值为：".$min_stack->get_min();
    $min_stack->pop();
    echo "<br>栈中最小值为：".$min_stack->get_min();
?>