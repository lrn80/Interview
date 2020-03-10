<?php
//把数组进行总大到小或还有从小到大的排序
//提示： 用到count函数
$array = array(31,15,48,12,15,63,43,51);
function bubble($arr){
    for($i=0;$i<count($arr);$i++){
        for($j=0;$j<(count($arr)-$i-1);$j++){
            if($arr[$j]>$arr[$j+1]){
                $tmp=$arr[$j];
                $arr[$j]=$arr[$j+1];
                $arr[$j+1]=$tmp;
            }
        }
    }
       return $arr;
}

function bubble2($arr){
    $i=count($arr);
    while ($i>0){
        $bool=$i;
        for ($j=0;$j<$i-1;$j++){
            if($arr[$j]>$arr[$j+1]){
                $tmp = $arr[$j];
                $arr[$j]=$arr[$j+1];
                $arr[$j+1]=$tmp;
                $bool=$j;
            }
        }
        $i=$bool;
    }
    return $arr;
}

function bubble3($array){
    $left=0;
    $right=count($array);
    while ($right>$left){
        for ($i=$left;$i<$right-1;$i++){   //正向冒泡找到最大值
            if($array[$i]>$array[$i+1]){
                $tmp = $array[$i];
                $array[$i]=$array[$i+1];
                $array[$i+1]=$tmp;
            }
        }
        $right--;                        //right的值向左移一位
        for ($j=$right;$j>$left;$j--){   //负向冒泡找到最小值
            if($array[$j]<$array[$j-1]){
                $tmp=$array[$j];
                $array[$j]=$array[$j-1];
                $array[$j-1]=$tmp;
            }
        }
        $left++;                        //left的值向右移一位
    }
    return $array;
}
