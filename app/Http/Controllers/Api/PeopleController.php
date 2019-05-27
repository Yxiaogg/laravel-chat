<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GatewayClient\Gateway;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function cc(){
        return 0.1+0.2;
    }
    //测试调用
    public function aa(Request $request){
        $id = $request->id;
        Gateway::sendToClient($id, json_encode(array(
            'type'      => 'login',
            'mssage' => '欢迎登录'
        )));
//        Gateway::sendToAll('c0a816ea0b54000000017','1324548asdf654');
        return;
//        Gateway::sendToAll('c0a816ea0b54000000f');
    }

    public function bb(Request $request){
        $mssage = $request->message;
        $id = $request->id;
        Gateway::sendToClient($id, json_encode(array(
            'type'      => 'msg',
            'message' => $mssage
        )));

    }

    private function task1() {
        for ($i = 1; $i <= 10; ++$i) {
            echo "This is task 1 iteration $i.\n";
            yield;
        }
    }

    function task2() {
        for ($i = 1; $i <= 5; ++$i) {
            echo "This is task 2 iteration $i.\n";
            yield;
        }
    }

    private function gen()
    {
        yield 'foo';
        yield 'bar';
    }

    private function rangeX($start,$limit,$step=1){
        for ($i=$start;$i<=$limit;$i+=$step){
            yield $i;
        }
        return;
    }

    /**
     *@func 插入排序
     * @describe 算法适用于少量数据的排序，时间复杂度为O(n^2)。是稳定的排序方法。
     * 插入算法把要排序的数组分成两部分：第一部分包含了这个数组的所有元素，
     * 但将最后一个元素除外（让数组多一个空间才有插入的位置），而第二部分就只包含这一个元素（即待插入元素）。
     * 在第一部分排序完成后，再将这个最后元素插入到已排好序的第一部分中。
     *
     * @author vio
     **/
    private function InsertSort(array $arr=[]){
        $count = count($arr);
        for($i=1;$i<$count;$i++){
            $t = $arr[$i];
            $j = $i-1;
            while ($j>=0 && $arr[$j]>$t){
                $arr[$j+1] = $arr[$j];
                $j--;
            }
            if ($i!=$j+1){
                $arr[$j+1] = $t;
            }
        }
        return $arr;
    }

    /**
     *@func 选择排序
     * @O    O(n^2)
     * @describe 遍历数组，将数组中最小的值换到第一个，然后再遍历数组，将第二小的值换到数组的第二个位置，以此类推
     * @author vio
     **/
    private function SelectSort(array $arr=[]){
        $count = count($arr);
        for($i=0;$i<$count;$i++){
            $k = $i;
            for($j=$i+1;$j<$count;$j++){
                if ($arr[$j]<$arr[$k]){
                    $k = $j;
                }
            }
            if ($k!=$i){
                $t = $arr[$k];
                $arr[$k] = $arr[$i];
                $arr[$i] = $t;
            }
        }
        return $arr;
    }

    /**
     *@func 冒泡排序
     * @describe 将数组的每一个数与其后的每一个数比较，如果这个数大于他后面的数，则交换位置
     * @author vio
     **/
    private function BubbleSort(array $arr=[]){
        $count = count($arr);
        for($i=0;$i<$count-1;$i++){
            for ($j=$i;$j<$count;$j++){
                if($arr[$i]>$arr[$j]){
                    $t = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $t;
                }
            }
        }
        return $arr;
    }

    /**
     *@func 快速排序
     * @O    O(nlogn) 最糟 O(n^2)
     * @describe 从数组中选一个基准点，遍历数组，大于基准点的放到一个数组，其余放到另一个数组。
     *      递归的对子数组排序
     * @author vio
    **/
    private function QuickSort(array $arr=[]){
        $count = count($arr);
        if ($count<=1){
            return $arr;
        }
        $pivot = $arr[0];
        $left = $right = [];
        for($i=1;$i<$count;$i++){
            if($arr[$i]<$pivot){
                array_push($left,$arr[$i]);
            }else{
                array_push($right,$arr[$i]);
            }
        }
        $left = $this->QuickSort($left);
        $right = $this->QuickSort($right);
        return array_merge($left,[$pivot],$right);
    }

}
