<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>酒店后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost:8088/thinkphp_hotel/Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost:8088/thinkphp_hotel/Application/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="http://localhost:8088/thinkphp_hotel/Application/Admin/Public/js/libs/modernizr.min.js"></script>
</head>
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
          <li><a href="/thinkphp_hotel/index.php/Admin/Order/checkout"><i class="icon-font">&#xe994;</i>退房清算</a></li>
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
          <li><a href="/thinkphp_hotel/index.php/Admin/Rmanage/addroom"><i class="icon-font">&#xe995;</i>新增房间</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/System/login_out"><i class="icon-font">&#xe994;</i>房间管理</a></li>
        </ul>
      </li>
      <li>
        <a href="#">房类管理</a>
        <ul class="sub-menu">
          <li><a href="/thinkphp_hotel/index.php/Admin/System/login_out"><i class="icon-font">&#xe995;</i>新增房类</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/System/login_out"><i class="icon-font">&#xe994;</i>房类管理</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">新增房间</span></div>
        </div>
        <div class="result-wrap">
            <form id="myform" name="myform" method="post" action="/thinkphp_hotel/index.php/Admin/Rmanage/addroom">
                <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="result-tab">
                    <tr>
                        <td width="%15" align="right" class="td_bg">房间编号：</td>
                        <td width="%85" class="td_bg"> <input name="roomid" type="text" id="roomid" size="10" maxlength="50" /></td>
                    </tr>


                    <tr>
                        <td align="right" class="td_bg">房间类型：</td>

                        <td class="td_bg">
                            <select name="typeid">

                                <?php if(is_array($roomtype)): $i = 0; $__LIST__ = $roomtype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=<?php echo ($vo["typeid"]); ?> ><?php echo ($vo["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>

                    </tr>
                    <tr>

                        <td align="right" class="td_bg">房间位置：</td>
                        <td class="td_bg">
                            <select name="location">
                                <option value="1楼东侧" selected>1楼东侧</option>
                                <option value="1楼中间">1楼中间</option>
                                <option value="1楼西侧">1楼西侧</option>
                                <option value="2楼东侧">2楼东侧</option>
                                <option value="2楼中间">2楼中间</option>
                                <option value="2楼西侧">2楼西侧</option>
                                <option value="3楼东侧">3楼东侧</option>
                                <option value="3楼中间">3楼中间</option>
                                <option value="3楼西侧">3楼西侧</option>
                                <option value="4楼西侧">4楼西侧</option>
                                <option value="4楼东侧">4楼东侧</option>
                            </select>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">入住状态：</td>
                        <td class="td_bg">
                            <select name="status">
                                <option value="否" selected>未入住</option>
                                <option value="是">已入住</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">房间描述：</td>
                        <td class="td_bg"><input name="remarks" type="text" id="remarks" size="100" maxlength="150" /></td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg"><input class="btn btn-warning" type="reset" name="submit2" id="button2" value="重置" /></td>
                        <td class="td_bg">
                            <input type="hidden" name="action" value="inserth">
                            <input class="btn btn-info" type="submit" name="submit" id="button" value="提交" /></td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>