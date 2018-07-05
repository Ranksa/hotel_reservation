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
            <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">房间管理</span></div>
        </div>
        <div class="result-wrap">
            <form id="myform" name="myform" method="post" action="/thinkphp_hotel/index.php/Admin/Rmanage/room_update?mrid=<?php echo ($list["roomid"]); ?>">
                <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="result-tab">
                    <tr>
                        <td width="%15" align="right" class="td_bg">房间编号：</td>
                        <td width="%85" class="td_bg"> <input name="roomid" type="text" id="roomid" value="<?php echo ($list["roomid"]); ?>" size="30" maxlength="50" /></td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">房间类型：</td>
                        <td class="td_bg">
                            <select name="typeid">
                                <option value="1000" selected>标准间【单人】</option>
                                <option value="1001" >标准间【双人】</option>
                                <option value="1002" >商务间【双人】</option>
                                <option value="1003" >商务间【单人】</option>
                                <option value="1004" >行政间【单人】</option>
                                <option value="1005" >豪华间</option>
                                <?php if(is_array($typename_list)): $i = 0; $__LIST__ = $typename_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ha): $mod = ($i % 2 );++$i; endforeach; endif; else: echo "" ;endif; ?>
                                </volist>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">房间位置：</td>
                        <td class="td_bg">
                            <select name="location">
                                <option value="<?php echo ($list["location"]); ?>" selected><?php echo ($list["location"]); ?></option>
                                <option value="1楼东侧">1楼东侧</option>
                                <option value="1楼中间">1楼中间</option>
                                <option value="1楼西侧">1楼西侧</option>
                                <option value="2楼东侧">2楼东侧</option>
                                <option value="2楼中间">2楼中间</option>
                                <option value="2楼西侧">2楼西侧</option>
                                <option value="3楼东侧">3楼东侧</option>
                                <option value="3楼中间">3楼中间</option>
                                <option value="3楼西侧">3楼西侧</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">房间状态：</td>
                        <td class="td_bg">
                            <select name="status">
                                <option value="否" selected>未入住</option>
                                <option value="是">已入住</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">房间描述：</td>
                        <td class="td_bg"><input name="remarks" type="text" id="remarks" value="<?php echo ($list["remarks"]); ?>" size="10" maxlength="15" /></td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg"><input type="reset" class="btn btn-warning" name="submit2" id="button2" value="重置" /></td>
                        <td class="td_bg">
                            <input type="hidden"  name="action" value="roomchg">
                            <input type="submit" class="btn btn-info" name="submit" id="button" value="提交" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>