<?php if (!defined('THINK_PATH')) exit(); $str='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890'; $code=null; for($i=1;$i<=5;$i++) { $code.='<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.$str{mt_rand(0,strlen($str)-1)}.'</span>'; } ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>酒店管理系统</title>
    <link rel="stylesheet"   type="text/css" href="http://localhost:8088/thinkphp_hotel/Application/Admin/Public/admin_login.css" >
    <!--   <link rel="stylesheet" href="../css/bootstrap.css" /> -->

</head>
<script language="javascript">
    function chkuserinput(form){
        if(form.username.value==""){
            alert("请输入用户名!");
            form.username.select();
            return(false);
        }
        if(form.pwd.value==""){
            alert("请输入用户密码!");
            form.pwd.select();
            return(false);
        }
        if(form.yz.value==""){
            alert("请输入验证码!");
            form.yz.select();
            return(false);
        }
        return(true);
    }
</script>


<body>
<div class="admin_login_wrap">
    <h1><center>后台管理</center></h1>
    <div class="adming_login_border">
        <div class="admin_input ">
            <form action="/thinkphp_hotel/index.php/Admin/Index/login" method="post" onSubmit="return chkuserinput(this)">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text"  class="admin_input_style"  name="username" value="admin" id="user" size="30" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password"  class="admin_input_style" name="pwd" value="admin" id="pwd" size="30" />
                    </li>
                    <li>
                        <label for="yanzheng">验证码：</label>
                        <input type="text"  class="admin_input_style " name="verify"  id="yz" size="6" maxlength="5" />
                        <?php echo "<span style=float:right>$code</span>"; ?>

                        <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo strip_tags($code)?>" />
                    </li>
                    <li>
                        <input type="submit" name="submit" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright">&copy; </a></p>
</div>
</body>
</html>