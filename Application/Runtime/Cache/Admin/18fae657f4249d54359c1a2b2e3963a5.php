<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
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
        <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">订单入住</span>
           &emsp;&emsp;  &emsp;&emsp;<span >当前日期：<?php error_reporting(E_ALL^E_NOTICE^E_WARNING); echo date("Y/m/d"); ?> </span>
        </div>
      </div>
      <div class="result-wrap">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form id="myform" name="myform" method="post" action="/thinkphp_hotel/index.php/Admin/Order/insert">
          <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="result-tab">
            <tr>
              <td width="25%" align="right" class="td_bg">房间编号：</td>
              <td width="%85" class="td_bg"> <input name="roomid" type="text" id="roomid" value="<?php echo ($vo["roomid"]); ?>" size="15" maxlength="20" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">类型编号：</td>
              <td class="td_bg"> <input name="typeid" type="text" id="typeid" value="<?php echo ($vo["typeid"]); ?>" size="15" maxlength="20" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">类型名称：</td>
              <td class="td_bg"> <input name="typename" type="text" id="typename" value="<?php echo ($vo["typename"]); ?>" size="15" maxlength="20" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">房间价格：</td>
              <td class="td_bg"> <input name="price" type="text" id="price" value="<?php echo ($vo["price"]); ?>" size="15" maxlength="20" />元/天</td>
            </tr>
            <tr>
              <td width="%15" align="right" class="td_bg">客户姓名：</td>
              <td width="%85" class="td_bg"> <input name="cname" type="text" id="cname" size="20" maxlength="30" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">证件类型：</td>
              <td class="td_bg">
                <select name="cardtype">
                  <option value="id_card" selected>身份证</option>
                  <option value="student_card">学生证</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right" class="td_bg">证件号码：</td>
              <td class="td_bg"><input name="cardid" type="text" id="cardid" size="30" maxlength="50" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">性别：</td>
              <td class="td_bg">
                <select name="csex">
                  <option value="男" selected>男</option>
                  <option value="女">女</option>
                </select>
            </tr>
            <tr>
              <td align="right" class="td_bg">入住时间：</td>
              
              <td class="td_bg"> <input type="date" value="<?php echo date("Y-m-d"); ?>" name="entertime" id="entertime" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">离开时间：</td>
              <td class="td_bg"><input name="leavetime" type="date" id="leavetime"  /></td>
             
            </tr>
            <tr>
              <td align="right" class="td_bg">联系电话：</td>
              <td class="td_bg"><input name="phone" type="text" id="phone" size="30" maxlength="50" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">订单备注：</td>
              <td class="td_bg"><input name="oremarks" type="text" id="oremarks" size="30" maxlength="50" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg"><input type="reset"  class="btn btn-warning" name="submit2" id="button2" value="重置" /></td>
              <td class="td_bg">
                <input type="hidden" name="action" value="inserto">
                <input type="hidden" name="_roomid" value="<?php echo ($vo["roomid"]); ?>">
                <input type="hidden" name="_typeid" value="<?php echo ($vo["typeid"]); ?>">
                <input type="hidden" name="_typename" value="<?php echo ($vo["typename"]); ?>">
                <input type="hidden" name="_price" value="<?php echo ($vo["price"]); ?>">
                <input type="submit" class="btn btn-info" name="submit" id="button" value="确认入住" /></td>
            </tr>
          </table>
        </form><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>