<?php
function selectionSort($arr){
     for($i=0;$i<count($arr)-1;$i++){
         //先假设最小的位置为$i
         $m=$i;
         //这个for循环是比较i后面的元素
         for($j=$m+1;$j<count($arr);$j++){
             if($arr[$m]>$arr[$j]){
                 $m=$j;
             }
         }
         //如果发现最小值与当前$i的位置不同，则位置互换
         if($m!=$i) {
             $tmp = $arr[$i];
             $arr[$i] = $arr[$m];
             $arr[$m] = $tmp;
         }
     }
     return $arr;
}
