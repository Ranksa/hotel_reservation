<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/25
 * Time: 14:16
 */

namespace Admin\Controller;


use Think\Controller;

class StatisticalController extends  Controller
{
    public function counto()
    {
        R('Index/checkLogin');
        //房间统计
        $arr=D('roomtype');
        $sql="select count(typeid),sum(bednum),sum(totalnum),sum(leftnum) from roomtype";
        $data_list=$arr->query($sql);
        //dump($data_list);
        $this->assign('list1',$data_list);

        //营业统计
        $arr2=D('record');
        $sql2="select count(orderid),sum(monetary) from record";
        $data_list=$arr2->query($sql2);
        //dump($data_list);
        $this->assign('list2',$data_list);
        $this->display();
    }
}