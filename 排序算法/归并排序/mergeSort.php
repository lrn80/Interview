<?php
function mergeSort(array $arr):array {
   return mergeSortR($arr,0,count($arr)-1);
}
//将数组array[$l.....$r]之间进行排序
function mergeSortR(array &$arr,int $l,int $r):array {
    $mid=$l+intval(($r-$l)/2);
    if($l>=$r){
        return array();
    }
    //将数组一分为二
    mergeSortR($arr,$l,$mid);
    mergeSortR($arr,$mid+1,$r);
    //进行归并
    if ($arr[$mid]>$arr[$mid+1])
   merge($arr,$l,$mid,$r);
   return  $arr;
}
function merge(array &$arr,int $l,int $mid,int $r) {
    for($i=$l;$i<=$r;$i++){
        $aux[$i-$l]=$arr[$i];  //开辟一个新数组来存储当前的数组
    }
    $i=$l;
    $j=$mid+1;
    for($k=$l;$k<=$r;$k++) {
        if ($i > $mid) {  //当 $i 越过 $mid 这个界限的时候，剩下的只有 $j 元素后面没有找到相应的位置 然后依次赋值就可以了
            $arr[$k] = $aux[$j-$l];
            $j++;
        }elseif($j>$r){
            $arr[$k]=$aux[$i-$l];
            $i++;
        }elseif($aux[$i-$l]<$aux[$j-$l]){
            $arr[$k]=$aux[$i-$l];
            $i++;
        }else{
            $arr[$k]=$aux[$j-$l];
            $j++;
        }
    }
}

$array = array(31, 15, 48, 12, 15, 63, 43, 51);
print_r(mergeSort($array));
function mergeSortBu(array $arr){
    $n=count($arr);
    for($sz=1;$sz<$n;$sz=$sz+$sz){
        for($i=0;$i+$sz<$n;$i+=min($sz+$sz,$n)){
            merge($arr,$i,$i+$sz-1,$i+$sz+$sz-1);
        }
    }
    return $arr;
}
$array = array(31, 15, 48, 12, 15, 63, 43, 51);
print_r(mergeSortBu($array));