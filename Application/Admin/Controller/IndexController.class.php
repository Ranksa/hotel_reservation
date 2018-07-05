<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function checkLogin()
    {
        if (!session('name'))
        {
            $this->error('请登录', U('Index/login'));
        }
    }
    public function Index()
    {
        $this->checkLogin();
        $model = new Model();
        $v = $model->query("select VERSION() as ver");
        $array['mysqlver'] = $v[0]['ver'];
        $info=array(
           'path'=> $_SERVER["DOCUMENT_ROOT"],
            'p_version'=>PHP_VERSION,
            'm_version'=> $array['mysqlver'],
            'host'=>$_SERVER['SERVER_NAME'],
            'ip'=> $_SERVER["HTTP_HOST"],
            'port'=> $_SERVER["SERVER_PORT"],
            'date'=> $showtime=date("Y-m-d H:i"),
            'os'=>  PHP_OS,
    );  //dump($info);
        $this->assign('list',$info);
        $this->display();
    }
    public function  login()
    {

        header("Content-type: text/html; charset=utf-8");

        if($_POST['submit'])
        {
            function make_safe($variable)
            {
                $variable = addslashes(trim($variable)); //返回要转义的字符
                return $variable;
            }

            $user=make_safe($_POST["username"]);
            $pass=md5(make_safe($_POST["pwd"])); //对密码进行md5加密
            $verify=strtolower(make_safe($_POST["verify"])); //对输入的和产生的验证码都转换为小写
            $cin_verify=strtolower(make_safe($_POST["hiddenField"]));

//进行验证码的校验
            if(strval($verify)!=strval($cin_verify))
            {
                echo "<script>alert('验证码输入错误!');history.go(-1);</script>";
                exit;
            }
            else
            {
                $data=D('admin');
                $condition['name']=$user;
                $info=$data->field('*')->where($condition)->select();
                if($info==false)
                {
                    echo "<script language='javascript'>alert('不存在此用户！');history.back();</script>";
                    exit;
                }
                else
                {
                    if($info[0]["passwd"]==$pass)
                    {
                        session_start();  //启用会话
                        session('name',"$info[0][\"name\"]");
                        //$_SESSION['aname']=$info[0]["name"];
                        $this->checkLogin();
                        $model = new Model();
                        $v = $model->query("select VERSION() as ver");
                        $array['mysqlver'] = $v[0]['ver'];
                        $info=array(
                            'path'=> $_SERVER["DOCUMENT_ROOT"],
                            'p_version'=>PHP_VERSION,
                            'm_version'=> $array['mysqlver'],
                            'host'=>$_SERVER['SERVER_NAME'],
                            'ip'=> $_SERVER["HTTP_HOST"],
                            'port'=> $_SERVER["SERVER_PORT"],
                            'date'=> $showtime=date("Y-m-d H:i"),
                            'os'=>  PHP_OS,
                        );  //dump($info);
                        $this->assign('list',$info);
                        $this->display( 'index');

                        exit;
                    }
                    else
                    {
                        echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
                        exit;
                    }
                }
            }
        }
        $this->display();
    }
    public function session()
    {
        $name='admin';
        $this->assign('name',$name);
        $this->display('../View/Public/head');
    }
}