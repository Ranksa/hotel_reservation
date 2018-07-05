<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/26
 * Time: 11:30
 */

namespace Admin\Controller;


use Think\Controller;

class RmanageController extends Controller
{

    public function  add_room()
    {
        R('Index/checkLogin');
        header("Content-type:text/html;charset=utf-8");
        $data_list=D('roomtype')->field('typename,typeid')->select();
        //dump($data_list);
        $key='无房间类型';
        if($data_list)
            $this->assign('roomtype',$data_list);
        else
             $this->assign('roomtype',$key);
        if($_POST["action"]=="inserth")
        {
            $data=array(
                'roomid'=>$_POST["roomid"],
                'typeid'=>$_POST["typeid"],
                'location'=>$_POST["location"],
                'status'=>$_POST["status"],
                'remarks'=>$_POST["remarks"],

            );
            $arr= D('room');//如果该类型房间编号存在，则不需要再插入
            $condition['roomid']=I('post.roomid');
            $count=$arr->where($condition)->count();
            if($count==0)
            {
                $info=$arr->add($data);
                  $this->success('添加成功',U('add_room'));
                return;
            }
            else
            {
                $this->success('添加失败,该房间已存在',U('add_room'));
                return;
            }

        }
        $this->display();
    }
    public function add_roomtype()
    {
        //新增房型
        R('Index/checkLogin');
        if($_POST["action"]=="insertt")
        {
            //$sql = "insert into roomtype (typename,area,bednum,hasFood,hasNet,hasTV,hasWC,price,totalnum,leftnum) values('".$_POST["typename"]."','".$_POST["area"]."','".$_POST["bednum"]."','".$_POST["hasFood"]."','".$_POST["hasNet"]."','".$_POST["hasTV"]."','".$_POST["hasWC"]."','".$_POST["price"]."','".$_POST["totalnum"]."','".$_POST["totalnum"]."')";
            //echo $sql;
            $data=array(

                'typename'=>$_POST["typename"],
                'area'=>$_POST["area"],
                'bednum'=>$_POST["bednum"],
                'hasFood'=>$_POST["hasFood"],
                'hasNet'=>$_POST["hasNet"],
                'hasTV'=>$_POST["hasTV"],
                'hasWC'=>$_POST["hasWC"],
                'price'=>$_POST["price"],
                'totalnum'=>$_POST["totalnum"],
                'leftnum'=>$_POST["totalnum"],
            );
            $arr= D('roomtype');//如果该类型房间编号存在，则不需要再插入
            $condition['typeid']=I('post.typeid');
            $count=$arr->where($condition)->count();
            if($count==0)
            {
                $info=$arr->add($data);

                echo "<script language=javascript>alert('添加成功！');history.go(-1);</script>";

            }
            else{

                echo "<script>alert('添加失败,该房类已存在');history.go(-1);</script>";

            }


        }
        $this->display();
    }
    //房间修改
    public  function  room_manage()
    {
        R('Index/checkLogin');
        header("Content-type:text/html;charset=utf-8");
        $arr=D('LobbyView');
        $search_type=I('post.search-type');
        $keywords=I('post.keywords');
        if($search_type==null)
        {
            $this->display();
            exit;
        }
        $contidion[$search_type]=array('like',"%$keywords%");
        $data_list=$arr->where($contidion)->select();
        //dump($data_list);
        $this->assign('list',$data_list);
        $this->display();
    }
    //删除房间
    public function  delete_r()
    {
        R('Index/checkLogin');
        if(@$_GET["rid"])
        {
            //$sql="delete from roomtype where typeid=".$_GET["rid"];
            //echo $sql;
            $arr=D('room');
            $condition['roomid']=$_GET["rid"];
            $arry=$arr->where($condition)->delete();
            if($arry)
            {
                $this->success('删除成功',U('room_manage'));
            }
            else
                $this->success('删除失败',U('room_manage'));
        }
    }
    //修改页面获取信息
    public function  rm_Modify()
    {
        R('Index/checkLogin');
        header("Content-type:text/html;charset=utf-8");
        $roomid=I('get.mid');
        //dump($roomid);
        $arr=D('LobbyView');
        $condition['roomid']=$roomid;
        $data=$arr->where($condition)->select();
        //dump($data);
        $data_list=array(
            'roomid'=>$data[0]["roomid"],
            'typeid'=>$data[0]["typename"],
            'location'=>$data[0]["location"],
            'status'=>$data[0]["status"],
            'remarks'=>$data[0]["remarks"],
        );
        $arr2=D('roomtype')->field('typeid,typename')->select();
        $count=D('roomtype')->count();
        for($i=0;$i<$count;$i++)
        {
            $typeid_list[$i]['typdid']=$arr2[$i]['typeid'];
            $typeid_list[$i]['typename']=$arr2[$i]['typename'];
            //$typename_list[$i]=$arr2[$i]['typename'];
        }
      dump($typeid_list);
//        dump($typename_list);
        dump($arr2);
        $this->assign('typeid_list',$typeid_list);
        //$this->assign('typename_list',$typename_list);
       dump($data_list);
        $this->assign('list',$data_list);
        $this->display();
    }
    //房间管理修改
    public function room_update()
    {
        R('Index/checkLogin');
        if(@$_POST["action"]=="roomchg")
        {
            $typeid=(int)($_POST["typeid"]);
            dump($typeid);
            $sqlstr = "update room set typeid=".$typeid.",location='".$_POST["location"]."',status='".$_POST["status"]."',remarks='".$_POST["remarks"]."' where roomid = '".$_GET["mrid"]."'";
            $arr=D('room')->execute($sqlstr);
            if ($arr)
            {
               $this->success('修改成功',U('Rmanage/room_manage'));
            }
            else
            {
                $this->error('修改失败',U('Rmanage/room_manage'));
            }
        }
    }
    public function  room_type_manage()
    {
        R('Index/checkLogin');
        $arr=D('roomtype');
        $search_type=$_POST["search-type"];
        if($search_type==null)
        {
            $this->display();
            exit;
        }
        $sql = "select * from roomtype where ".@$_POST["search-type"]." like ('%".@$_POST["keywords"]."%')";
        $data_list=$arr->query($sql);
        $this->assign('list',$data_list);
        $this->display();
    }
    //修改房型
    public function rt_Modify()
    {
        R('Index/checkLogin');
        header("Content-type:text/html;charset=utf-8");
        $rid=I('get.rid');
        //dump($rid);
        //dump($_POST["typename"]);
        //dump($_POST['rid']);
        $condition['typeid']=$rid;
        $data=D('roomtype')->where($condition)->select();
        //dump($data);
        $data_list=array(
            'typeid'=>$data[0]["typeid"],
            'typename'=>$data[0]["typename"],
            'area'=>$data[0]["bednum"],
            'hasFood'=>$data[0]["hasfood"],
            'hasNet'=>$data[0]["hasnet"],
            'hasTV'=>$data[0]["hastv"],
            'hasWC'=>$data[0]["haswc"],
            'price'=>$data[0]["price"],
            'totalnum'=>$data[0]["totalnum"],
            'leftnum'=>$data[0]["leftnum"],
        );
        $this->assign('list',$data_list);

        $this->display();
    }
    //删除房型
    public function delete_rt()
    {
        R('Index/checkLogin');
        if(@$_GET["rid"])
        {
            $sql="delete from roomtype where typeid=".$_GET["rid"];
            //echo $sql;
            //$arry=mysqli_query($conn,$sql);
            $arr=D('roomtype')->execute($sql);
            if ($arr)
            {
                $this->success('删除成功',U('Rmanage/room_type_manage'));
            }
            else
            {
                $this->error('删除失败',U('Rmanage/room_type_manage'));
            }
        }
    }
    //修改房型数据库操作
    public function rt_update()
    {
        R('Index/checkLogin');
        header("Content-type:text/html;charset=utf-8");
        if(@$_POST["action"]=="modify")
        {
            $sqlstr = "update roomtype set typename='".$_POST["typename"]."',area='".$_POST["area"]."',bednum=".$_POST["bednum"].",hasFood='".$_POST["hasFood"]."',hasNet='".$_POST["hasNet"]."',hasTV='".$_POST["hasTV"]."',price=".$_POST["price"].",totalnum=".$_POST["totalnum"].",leftnum=".$_POST["leftnum"]." where typeid = ".$_GET["mtid"];
            //echo $sqlstr;
            //$arry=mysqli_query($conn,$sqlstr);
            $arr=D('roomtype')->execute($sqlstr);
            if ($arr)
            {
                $this->success('修改成功',U('Rmanage/room_type_manage'));
            }
            else
            {
                $this->error('修改失败',U('Rmanage/room_type_manage'));
            }
        }
    }

}