<?php
/**
 * Created by PhpStorm.
 * User: zimo
 * Date: 2017/8/7
 * Time: 15:29
 */

/**
 * 交换数组中的两个数
 * @param $array
 * @param $a
 * @param $b
 */
function swap(&$array,$a,$b){
    $temp = $array[$a];
    $array[$a] = $array[$b];
    $array[$b] = $temp;
}

/**
 * 构建大顶堆
 * @param $array
 * @param $start
 * @param $end
 */
function adjustHeap(&$array,$start,$end){

    //父节点
    $dad = $start;
    //左子节点
    $left = 2*$dad+1;
    //右子节点
    $right = $left+1;
    //判断是否超出范围
    if ($left > $end){return;}
    //得到较大的子节点
    $bigSon = $left;
    if ($right <= $end && $array[$left]<$array[$right]){
        $bigSon = $right;
    }

    //父节点与较大的子节点换位置，并以该子节点为起点，继续构建大顶堆
    if ($array[$dad] <= $array[$bigSon]){
        swap($array,$dad,$bigSon);
        adjustHeap($array,$bigSon,$end);
    }
}

/**
 * 堆排序主函数
 * @param $array
 * @return mixed
 */
function heapSort($array){
    $end = count($array);

    //初始化堆，从最后一个子节点开始
    for ($i = floor($end/2)-1;$i>=0;$i--){
        adjustHeap($array,$i,$end);
    }

    //堆顶元素与堆底元素互换，并对除堆底元素外的其他元素重新构建大顶堆
    for ($i = $end-1;$i>0;$i--){
        swap($array,$i,0);
        adjustHeap($array,0,$i-1);
    }
    return $array;
}

$array = [5,6,3,8,7,4,9,2,1];

print_r(heapSort($array));
