<?php 
    define("N",4);     

    /* 打印最终结果 */
    function printSolution(&$sol)
    {
        for ($i = 0; $i < N; $i++)
        {
            for ($j = 0; $j < N; $j++)
                printf(" %d ", $sol[$i][$j]);
            printf("<br>");
        }
    }
     
    /* 判断x,y是不是合理的可走的单元 */
    function isSafe($maze, $x, $y)
    {
        if($x >= 0 && $x < N && $y >= 0 && $y < N && $maze[$x][$y] == 1)
            return true;
        else
            return false;
    }
     
    function getPath($maze, $x, $y, &$sol)
    {
        /* 走到了目的地 */
        if($x == N-1 && $y == N-1)
        {
            $sol[$x][$y] = 1;
            return true;
        }
     
        /* 检查maze[x][y]是否是合理可走的单元 */
        if(isSafe($maze, $x, $y))
        {
            /* 标记当前的单元为1 */
            $sol[$x][$y] = 1;
             /* 向右走一步并判断是否能走到终点 */
            if (getPath($maze, $x+1, $y, $sol))
                return true;
             /* 向下走一步并判断是否能走到终点 */
            if (getPath($maze, $x, $y+1, $sol))
                return true;
             /* 如果上面两步都不能走到终点，回溯到上一步 */
            $sol[$x][$y] = 0;
            return false;
        }   
        return false;
    }
 
    $maze  =  [ 
        [1, 0, 0, 0],
        [1, 1, 0, 1],

        [0, 1, 0, 0],
        [1, 1, 1, 1]
    ];
    $sol = [ 
            [0, 0, 0, 0],
            [0, 0, 0, 0],
            [0, 0, 0, 0],
            [0, 0, 0, 0]
        ];
    if(!getPath($maze, 0, 0, $sol))
    {
        printf("Solution doesn't exist");
    }
    else
    {
        printSolution($sol);
    }
?>