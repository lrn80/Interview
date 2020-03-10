<?php
function insertSort($arr){
    for ($i=1;$i<count($arr);$i++){
        $e=$arr[$i];              //存储当前要插入的值副本
        //寻找 arr[$i] 元素要插入的位置
        for($j=$i;$j>0;$j--){
            if($e<$arr[$j-1]){
                $arr[$j]=$arr[$j-1];
            }else{
                break;
            }
        }
        $arr[$j]=$e;
    }
    return $arr;
}

function insertSort2($arr){
    for($i=1;$i<count($arr);$i++){
        $e = $arr[$i];
        $left = 0;
        $right = $i-1;
        //查找[$left,$right]之间的值
        while ($left<=$right){
            $mid = intval(($left+($right-$left)/2));
            if ($arr[$mid]<$e){
                $left = $mid+1;
            }
            if ($e<$arr[$mid]){
                $right=$mid-1;
            }
        }
        //查找出第 $left位置元素为要插入元素的位置
        for($j=$i-1;$j>=$left;$j--){
            $arr[$j+1]=$arr[$j];
        }
        $arr[$left]=$e;
    }
    return $arr;
}
