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
            <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">新增房类</span></div>
        </div>
        <div class="result-wrap">
            <form id="myform" name="myform" method="post" action="/thinkphp_hotel/index.php/Admin/Rmanage/add_roomtype">
                <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="result-tab">
                    <tr>
                        <td width="%15" align="right" class="td_bg">类型名称：</td>
                        <td width="%85" class="td_bg"> <input name="typename" type="text" id="typename" size="30" maxlength="50" /></td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">房间面积：</td>
                        <td class="td_bg"> <input name="area" type="text" id="area" size="10" maxlength="15" />㎡</td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">床位数量：</td>
                        <td class="td_bg"> <input name="bednum" type="text" id="bednum" size="10" maxlength="15" />个</td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">早&emsp;&emsp;餐：</td>
                        <td class="td_bg">
                            <select name="hasFood">
                                <option value="有" selected>有早餐</option>
                                <option value="无">无早餐</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">网&emsp;&emsp;络：</td>
                        <td class="td_bg">
                            <select name="hasNet">
                                <option value="有" selected>有网络</option>
                                <option value="无">无网络</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">电&emsp;&emsp;视：</td>
                        <td class="td_bg">
                            <select name="hasTV">
                                <option value="有" selected>有电视</option>
                                <option value="无">无电视</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">浴&emsp;&emsp;室：</td>
                        <td class="td_bg">
                            <select name="hasWC">
                                <option value="有" selected>有浴室</option>
                                <option value="无">无浴室</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">价&emsp;&emsp;格：</td>
                        <td class="td_bg"> <input name="price" type="text" id="price" size="10" maxlength="15" />元/天</td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">总&emsp;&emsp;量：</td>
                        <td class="td_bg"><input name="totalnum" type="text" id="totalnum" size="10" maxlength="15" />间</td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg"><input type="reset" class="btn btn-warning" name="submit2" id="button2" value="重置" /></td>
                        <td class="td_bg">
                            <input type="hidden" name="action" value="insertt">
                            <input type="submit" class="btn btn-info" name="submit" id="button" value="提交" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>