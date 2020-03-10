<?php
function QuickSort(array $arr):array {
    QuickSortR($arr,0,count($arr)-1);
    return $arr;
}
function QuickSortR(array &$arr,int $l,int $r){
    if($l>=$r)
        return $arr;
    $p = partation($arr,$l,$r);
    QuickSortR($arr,$l,$p-1);
    QuickSortR($arr,$p+1,$r);
}
//对$l...$r部分进行排序
function partation(array &$arr,int $l,int $r): int{
    //当数组近乎有序的状态下 如果只是取第一个元素的话 很有可能退化成O(n*n)级别的算法，所以这里要随机去一个数组来和头数组进行替换
    $rand=random_int(0,$r)%($r-$l+1)+$l;
    $tmp = $arr[$l];
    $arr[$l]=$arr[$rand];
    $arr[$rand]=$tmp;

    $v = $arr[$l];
    $j=$l;
    //arr[$l+1.....$j]<$v,arr[$j+1......$i)>$v
    for($i=$l+1;$i<=$r;$i++){
        if($arr[$i]<$v){
            $tmp=$arr[$i];
            $arr[$i]=$arr[$j+1];
            $arr[$j+1]=$tmp;
            $j++;
        }
    }
    $arr[$l]=$arr[$j];
    $arr[$j]=$v;
    return $j;
}
/*
 * “双路快速排序”
 * 在上面的partation中，的快速排序当整个排序过程中的重复元素比较多时就会使 V 分开的两端极度不平衡。这时候排序的性能相应的也会退化
 * 在下面的partation2中将会对快速排序进行优化
 * 思路：在上面的思路中我们将小于V大于V的我们放到了一头然后 i 从左到右直到遍历到 数组的右端边界
 * 这次我们将 小于V大于V放到数组的 两端 这样我们就需要一个j 的索引来记录大于V的那一端下一个要扫描的元素 i来记录小于v的那一端要扫描的元素
 * 在j和i的扫描过程中如果 i指向的当前元素 小于 V 则i 继续扫描下一个元素直到 i指向的当前元素大于等于V  当 j指向的元素 大于 V 的时候继续扫描前一个元素
 * j 指向的元素 小于等于V 这时候 i和j的位置 进行互换位置然后i++ j-- 直到 i>j 循环停止
 * 最后我们可以看到 i最后是停留在最后一个大于等于V 的位置 j最后停留在最后一个的小于等于 V 的位置最后我们将 $v 和 arr[$j]位置进行互换 便完成了排序
 *
 */
function partation2(array &$arr,int $l,int $r): int{
    //当数组近乎有序的状态下 如果只是取第一个元素的话 很有可能退化成O(n*n)级别的算法，所以这里要随机去一个数组来和头数组进行替换
    $rand=intval(random_int(0,$r)%($r-$l+1)+$l);
    $tmp = $arr[$l];
    $arr[$l]=$arr[$rand];
    $arr[$rand]=$tmp;
    //将第一个元素作为v的值
    $v = $arr[$l];
    $i=$l+1;
    $j=$r;
    //arr[l+1.....i)<=V; arr(j.....r]>=V元素进行排序
    while (true){
        while ($i<=$r&&$arr[$i]<$v){
            $i++;
        }
        while ($j>=$l+1&&$arr[$j]>$v){
            $j--;
        }
        if($i>$j){
            break;
        }else{
            $tmp=$arr[$i];
            $arr[$i]=$arr[$j];
            $arr[$j]=$tmp;
            $i++;
            $j--;
        }
    }
    $arr[$l]=$arr[$j];
    $arr[$j]=$v;
    return  $j;
}
//三路快速排序
function partation3(array &$arr,$l,$r){
    //当数组近乎有序的状态下 如果只是取第一个元素的话 很有可能退化成O(n*n)级别的算法，所以这里要随机去一个数组来和头数组进行替换
    $rand =random_int(0, $r) % ($r - $l + 1) + $l;
    $tmp = $arr[$l];
    $arr[$l]=$arr[$rand];
    $arr[$rand]=$tmp;
    //将第一个元素作为v的值
    $v = $arr[$l];
    $lt = $l; //在arr[l+1......lt]小于V
    $i = $l+1;//arr[lt.....$i) == V
    $gt = $r+1; // arr[gt......r] 大于 V
    while($i<$gt){
        if($arr[$i]<$v){
            $tmp=$arr[$i];
            $arr[$i]=$arr[$lt+1];
            $arr[$lt+1]=$tmp;
            $lt++;
            $i++;
        }else if($arr[$i]>$v){
            $tmp=$arr[$i];
            $arr[$i]=$arr[$gt-1];
            $arr[$gt-1]=$tmp;
            $gt--;
        }else{
            $i++;
        }
    }
    $arr[$l]=$arr[$lt];
    $arr[$lt]=$v;
    return [$lt-1,$gt];
}
$array = array(31, 15, 48, 12, 15, 63, 43, 51);
print_r(QuickSort($array));