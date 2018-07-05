<?php
/**
 * Created by PhpStorm.
 * User: XAO-MI
 * Date: 2018/6/26
 * Time: 15:24
 */

namespace Admin\Controller;


use Think\Controller;

class SystemController extends Controller
{
    public function password()
    {
        R('Index/checkLogin');
        $data=D('admin');
        $open_name=$_SESSION["aname"];
        $condition['name']='admin';
        $data_list=$data->field('*')->where($condition)->select();
        $this->assign('list',$data_list);

        //dump($data_list);

        $this->display();
        if($_POST["Submit"])
        {
            if($data_list[0]["passwd"]==md5($_POST["password"]))
            {
                $password2=md5($_POST["password2"]);

                $sql="update admin set passwd='$password2' where name='admin'";
                D('admin')->execute($sql);

                echo "<script language='javascript'>alert('修改成功,请重新进行登陆！');window.location='__MUDULE__/'</script>";
                exit();
            }
            else
            {
                echo "<script language='javascript'>alert('原始密码不正确,请重新输入');window.history.go(-1)</script>";
            }
        }
    }

    public function login_out()
    {
        R('Index/checkLogin');
        session_start();
        session_unset();

        session_destroy();
        //unset($_SESSION);
        $this->success('注销成功！',U('home/index/index'));
    }


}