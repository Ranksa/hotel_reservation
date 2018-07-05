<?php if (!defined('THINK_PATH')) exit();?><!--/main-->
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>酒店后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost:8088/thinkphp_hotel/Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost:8088/thinkphp_hotel/Application/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="http://localhost:8088/thinkphp_hotel/Application/Admin/Public/js/libs/modernizr.min.js"></script>
</head>
<script language="javascript">
    function checkspace(checkstr)
    {
        var str = '';
        for(i = 0; i < checkstr.length; i++)
        {
            str = str + ' ';
        }
        return (str == checkstr);
    }
    function check()
    {
        if(checkspace(document.renpassword.password.value))
        {
            document.renpassword.password.focus();
            alert("原密码不能为空！");
            return false;
        }
        if(checkspace(document.renpassword.password1.value))
        {
            document.renpassword.password1.focus();
            alert("新密码不能为空！");
            return false;
        }
        if(checkspace(document.renpassword.password2.value))
        {
            document.renpassword.password2.focus();
            alert("确认密码不能为空！");
            return false;
        }
        if(document.renpassword.password1.value != document.renpassword.password2.value)
        {
            document.renpassword.password1.focus();
            document.renpassword.password1.value = '';
            document.renpassword.password2.value = '';
            alert("新密码和确认密码不相同，请重新输入");
            return false;
        }
        document.admininfo.submit();
    }
</script>
<body>

<div class="topbar-wrap white">
  <div class="topbar-inner clearfix">
    <div class="topbar-logo-wrap clearfix">
      <ul class="navbar-list clearfix">
        <li><a class="on" href="/thinkphp_hotel/index.php/Admin/Index/">网站后台</a></li>
        <li><a href="/thinkphp_hotel/index.php/Home/Index/">网站首页</a></li>
      </ul>
    </div>
    <div class="top-info-wrap">
      <ul class="top-info-list clearfix">
        <li>登录用户：<?php session_start(); echo $_SESSION["aname"]; ?></li>
        <li><a href="/thinkphp_hotel/index.php/Admin/Index/login/"><i class="icon-font">&#xe9b6;</i>退出</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
  <div class="sidebar-title">
    <h1>预订菜单</h1>
  </div>
  <div class="sidebar-content">
    <ul class="sidebar-list">
      <li>

        <a >入住管理</a>
        <ul class="sub-menu">
          <li><a href="/thinkphp_hotel/index.php/Admin/Lobby/lobby"><i class="icon-font">&#xe960;</i>办理入住</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/Order/manage"><i class="icon-font">&#xe960;</i>订单入住</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/Query/query"><i class="icon-font">&#xe986;</i>入住查询</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/History/record"><i class="icon-font">&#xe986;</i>历史订单</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/Statistical/counto"><i class="icon-font">&#xe99a;</i>入住统计</a></li>
        </ul>
      </li>
      <li>
        <a >退房管理</a>
        <ul class="sub-menu">
          <li><a href="/thinkphp_hotel/index.php/Admin/Checkout/checkout"><i class="icon-font">&#xe994;</i>退房清算</a></li>
        </ul>
      </li>

    </ul>
  </div>
</div>
    <div class="sidebar-wrap2">
  <div class="sidebar-title">
    <h1>房类菜单</h1>
  </div>
  <div class="sidebar-content">
    <ul class="sidebar-list">

      <li>
        <a href="#">房间管理</a>
        <ul class="sub-menu">
          <li><a href="/thinkphp_hotel/index.php/Admin/Rmanage/add_room"><i class="icon-font">&#xe995;</i>新增房间</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/Rmanage/room_manage"><i class="icon-font">&#xe994;</i>房间管理</a></li>
        </ul>
      </li>
      <li>
        <a href="#">房类管理</a>
        <ul class="sub-menu">
          <li><a href="/thinkphp_hotel/index.php/Admin/Rmanage/add_roomtype"><i class="icon-font">&#xe995;</i>新增房类</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/Rmanage/room_type_"><i class="icon-font">&#xe994;</i>房类管理</a></li>
        </ul>
      </li>
      <li>
        <a href="#">系统管理</a>
        <ul class="sub-menu">
          <li><a href="/thinkphp_hotel/index.php/Admin/System/password"><i class="icon-font">&#xe991;</i>密码修改</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/System/login_out"><i class="icon-font">&#xe9b6;</i>退出系统</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">密码修改</span></div>
        </div>

        <div class="result-wrap">
            <form name="renpassword" id="renpassword" method="post">
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <td width="20%" align="right" class="td_bg">用户名：</td>
                            <td width="80%" class="td_bg"><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["name"]); endforeach; endif; else: echo "" ;endif; ?></td>
                        </tr>
                        <tr>
                            <td align="right" class="td_bg">原密码：</td>
                            <td class="td_bg"><input name="password" type="password" id="password" size="20"></td>
                        </tr>
                        <tr>
                            <td align="right" class="td_bg">新密码：</td>
                            <td class="td_bg"><input name="password1" type="password" id="password1" size="20"></td>
                        </tr>
                        <tr>
                            <td align="right" class="td_bg">确认密码：</td>
                            <td class="td_bg"><input  name="password2" type="password" id="password2" size="20"></td>
                        </tr>
                        <tr>
                            <td align="right" class="td_bg"><input class="td_bg btn btn-warning" type="reset" name="reset" value="重置"></td>
                            <td class="td_bg"><input class="td_bg btn btn-info" onClick="return check();" type="submit" name="Submit" value="确定更改"></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>