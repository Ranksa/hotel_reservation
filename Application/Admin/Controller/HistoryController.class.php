<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/25
 * Time: 14:16
 */

namespace Admin\Controller;


use Think\Controller;

class HistoryController extends  Controller
{
    public function record()
    {
        $arr=D('OrderView');
        //dump($_POST["search-type"]);
        if($_POST["search-type"]==null)
        {
            $this->display();
            exit;
        }
        $sql = "select a.orderid,a.roomid,a.cardid,a.entertime,a.leavetime,b.typename,a.linkman,a.phone,a.ostatus,a.oremarks from record a,roomtype b where a.typeid=b.typeid and a.".@$_POST["search-type"]." like ('%".@$_POST["keywords"]."%')";
        $data_list=$arr->query($sql);
        //dump($data_list);

        $this->assign('list',$data_list);
        $this->display();
    }
}