<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/27
 * Time: 14:19
 */

namespace Admin\Controller;


use Think\Controller;

class CheckoutController extends Controller
{
    //办理退房
    public function checkout()
    {
        header("Content-type: text/html; charset=utf-8");
        R('Index/checkLogin');
        $arr=D('CheckView');
        if($_POST["roomid"]==null)
        {
            $this->display();
            exit;
        }
        $condition['roomid']=$_POST["roomid"];
        $data_list=$arr->where($condition)->select();
        $arr2=D('LobbyView');
        $data_list2=$arr2->where($condition)->select();
        $monetary=$data_list2[0]['price']*$data_list[0]['datenum'];
        $this->assign('list',$data_list);
        $this->assign('list2',$data_list2);
        $this->assign('monetary', $monetary);
        $this->display();
    }
    public function  out_update()
    {
        header("Content-type: text/html; charset=utf-8");
        R('Index/checkLogin');
        if(@$_GET["crid"])
        {

            //将订单信息移到record表
            $sql1 = "insert into record(orderid,roomid,cardid,cardtype,cname,csex,entertime,leavetime,typeid,linkman,phone,ostatus,oremarks) select * from (select a.orderid,a.roomid,a.cardid,b.cardtype,b.cname,b.csex,a.entertime,a.leavetime,a.typeid,a.linkman,a.phone,a.ostatus,a.oremarks from orders a,customer b where a.cardid=b.cardid and a.orderid=".$_GET["orderid"].") tmp";
            $arr=D('CheckView');
            $data_list=$arr->execute($sql1);
            //更新record表中monetary字段
            $condition['orderid']=($_GET['orderid']);
            $condition2['roomid']=$_GET['crid'];
            D('record')->where($condition)->where($condition2)->setField('monetary',$_GET['money']);

            //删除orders中相应的记录
            $sql4 = "delete from orders where roomid = ".$_GET["crid"]." and orderid=".$_GET["orderid"];
            D('orders')->delete($_GET['orderid']);
            //删除customer表中的客户记录
            $sql3 = "delete from customer where cardid in (select cardid from record where roomid = ".$_GET["crid"]." and orderid=".$_GET["orderid"].")";
            D('customer')->execute($sql3);
            //更新roomtype表中leftunm字段
            $sql5 = "update roomtype set leftnum=leftnum+1 where typeid=".$_GET["typeid"];
            D('roomtype')->execute($sql5);
            //更新room表中status字段
            $sql6 = "update room set status='否' where roomid=".$_GET["crid"];
            D('room')->execute($sql6);
            $this->success('退房清算成功',U('checkout'));
        }
    }
}