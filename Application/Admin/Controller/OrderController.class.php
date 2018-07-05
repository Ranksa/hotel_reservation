<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/25
 * Time: 14:16
 */

namespace Admin\Controller;


use Think\Controller;

class OrderController extends  Controller
{

    public function  add_order(){
        R('Index/checkLogin');
      //$sql="select a.roomid,b.typeid,b.typename,b.price from room a,roomtype b where a.typeid=b.typeid and a.roomid=".$_GET["orid"];
        $data=D('LobbyView');
        $condition['roomid']=I('get.orid');
        $data_list=$data->field('roomid,typeid,typename,price')->where($condition)->select();
        //dump($data_list);
        $this->assign('list',$data_list);
        $this->display();
    }
    public function insert()
    {
        //客户定酒店
        R('Index/checkLogin');
        header("Content-type:text/html;charset=utf-8");
        if($_POST["action"]=="inserto")
        {
            if($_POST["_roomid"]!=$_POST["roomid"]||$_POST["typeid"]!=$_POST["_typeid"]||$_POST["typename"]!=$_POST["_typename"]||$_POST["price"]!=$_POST["_price"])
            {
                echo "<script>alert('不可修改固定信息');history.go(-1);</script>";
                exit();
            }
            if(strlen($_POST["cname"])==0)
            {
                echo "<script>alert('客户名不能为空');history.go(-1);</script>";
                exit();
            }
            if($_POST['cardtype']=='id_card')
            {
                if(strlen($_POST["cardid"])<18||strlen($_POST["cardid"])>18)
                {
                    echo "<script>alert('身份证格式错误');history.go(-1);</script>";
                    exit();
                }


            }
            if($_POST["cardtype"]=='student_card')
            {
                if(strlen($_POST["cardid"])<13||strlen($_POST["cardid"])>15)
                {
                    echo "<script>alert('学生证格式错误');history.go(-1);</script>";
                    exit();
                }
            }


            if(strlen($_POST["entertime"])==0||strlen($_POST["leavetime"])==0)
            {
                echo "<script>alert('请选择入住时间和离开时间');history.go(-1);</script>";
                exit();
            }
            $enter_month=(int)substr($_POST["entertime"], 5,2);
            $enter_date=(int)substr($_POST["entertime"], 8,2);
            $leave_month=(int)substr($_POST["leavetime"], 5,2);
            $leave_date=(int)substr($_POST["leavetime"],8,2);
            $enter_year=(int)substr($_POST["entertime"],0,4);
            $leave_year=(int)substr($_POST["leavetime"],0,4);
            $now_year=(int)substr(date("Y/m/d"),0,4);
            $now_month=(int)substr(date("Y/m/d"), 5,2);
            $now_date=(int)substr(date("Y/m/d"), 8,2);
            $a=$now_year*1000+$now_month*100+$now_date;
            $b=$enter_year*1000+$enter_month*100+$enter_date;
            if($a>$b)
            {
                echo "<script>alert('入住时间不能选择过去的时间');history.go(-1);</script>";
                exit();
            }

            if($leave_year-$enter_year==0)
            {
                if($leave_month-$enter_month==0)
                {
                    $datenum=$leave_date-$enter_date;
                }
                else if($leave_month-$enter_month>0)
                {
                    if($enter_month==1||$enter_month==3||$enter_month==5||$enter_month==7||$enter_month==8||$enter_month==10||$enter_month==12)
                        $datenum=($leave_month-$enter_month)*31+$leave_date-$enter_date;
                    if($enter_month==4||$enter_month==6||$enter_month==9||$enter_month==11)
                        $datenum=($leave_month-$enter_month)*30+$leave_date-$enter_date;
                    if($enter_year%4==0&&$enter_month==2)
                        $datenum=($leave_month-$enter_month)*28+$leave_date-$enter_date;
                    if($enter_year%4!=0&&$enter_month==2)
                        $datenum=($leave_month-$enter_month)*29+$leave_date-$enter_date;

                }
                else
                    $datenum=-1;
            }
            else if($leave_year-$enter_year>0)
            {
                if($enter_month==1||$enter_month==3||$enter_month==5||$enter_month==7||$enter_month==8||$enter_month==10||$enter_month==12)
                    $datenum=(($leave_year-$enter_year)*12+$leave_month-$enter_month)*31+$leave_date-$enter_date;
                if($enter_month==4||$enter_month==6||$enter_month==9||$enter_month==11)
                    $datenum=(($leave_year-$enter_year)*12+$leave_month-$enter_month)*30+$leave_date-$enter_date;
                if($enter_year%4==0&&$enter_month==2)
                    $datenum=(($leave_year-$enter_year)*12+$leave_month-$enter_month)*28+$leave_date-$enter_date;
                if($enter_year%4!=0&&$enter_month==2)
                    $datenum=(($leave_year-$enter_year)*12+$leave_month-$enter_month)*29+$leave_date-$enter_date;

            }
            else $datenum=-1;
            if($datenum>30)
            {
                echo "<script>alert('预订酒店最多可预订30天');history.go(-1);</script>";
                exit();
            }
            if($datenum==-1)
            {
                echo "<script>alert('预订酒店最多可预订30天');history.go(-1);</script>";
                exit();
            }
            if(strlen($_POST["phone"])==0)
            {
                echo "<script>alert('手机号不能为空');history.go(-1);</script>";
                exit();
            }
            if(strlen($_POST["phone"])!=11)
            {
                echo "<script>alert('手机号格式错误空');history.go(-1);</script>";
                exit();
            }

            //在customer表中插入一条记录（房间编号，类型编号，客户姓名，性别）

            $data_customer=array(
                'cardid'=>I('post.cardid'),
                'cardtype'=>I('post.cardtype'),
                'cname'=>I('post.cname'),
                'csex'=>I('post.csex'),
            );
            $condition['cardid']=I('post.cardid');
            $arr= D('customer');//如果该客户存在，则不需要再插入
            $count=$arr->where($condition)->count();
            if($count==0)
                $info=$arr->add($data_customer);


            //在orders表中插入一条记录（）
            $data_orders=array(
                'roomid'=>I('post.roomid'),
                'cardid'=>I('post.cardid'),
                'entertime'=>I('post.entertime'),
                'leavetime'=>I('post.leavetime'),
                'typeid'=>I('post.typeid'),
                'linkman'=>I('post.cname'),
                'phone'=>I('post.phone'),
                'ostatus'=>'是',
                'oremarks'=>'否',
                'datenum'=>$datenum
            );
            $arr= D('orders');
            $info=$arr->add($data_orders);

            //更新roomtype表中leftunm字段
            $arr=D('roomtype');
            $condition['typeid']=I('post.typeid');
            $leftnum=$arr->field('leftnum')->where($condition)->select();
            $leftnum=((int)$leftnum[0]['leftnum']);
            $info=$arr->where($condition)->setField('leftnum',$leftnum-1);
            $this->success('在线预订成功',U('lobby/lobby'));
        }

    }
    //办理入住,订单入住更新状态
    public function transact()
    {
        R('Index/checkLogin');
        if(@$_GET["olrid"])
        {
            $arr1=D('room');
            $arr2=D('orders');
            //更新room表中status字段
            $sql = "update room set status='是' where roomid=".$_GET["olrid"];
            //mysqli_query($conn,$sql) or die ("更新room表中status字段失败：".mysqli_error());
            $arr1->execute($sql);

            //更新orders表中oremarks字段
            $sql2 = "update orders set oremarks='是' where roomid=".$_GET["olrid"];
            //mysqli_query($conn,$sql2) or die ("更新orders表中oremarks字段失败：".mysqli_error());
            $arr2->execute($sql2);
            $this->success('订单入住成功',U('manage'));
            //echo "<script language=javascript>alert('订单入住成功');'</script>";
        }

    }

    //查询办理入住订单
    public function  manage()
    {
        R('Index/checkLogin');
        header("Content-type:text/html;charset=utf-8");
        $arr=D('OrderView');
        if($_POST["search-type"]==null)
        {
            $this->display();
            exit;
        }
        $sql = "select a.orderid,a.roomid,a.cardid,a.entertime,a.leavetime,b.typename,a.linkman,a.phone,a.ostatus,a.oremarks,b.price from orders a, roomtype b where a.typeid=b.typeid and a.ostatus='是' and a.oremarks='否' and a.".$_POST["search-type"]." like ('%".$_POST["keywords"]."%')";
        $data_list=$arr->query($sql);
        $this->assign('list',$data_list);
        //dump($data_list);
        $this->display();
    }


}