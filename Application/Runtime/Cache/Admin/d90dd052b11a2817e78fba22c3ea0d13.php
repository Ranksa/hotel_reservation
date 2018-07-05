<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>酒店后台管理</title>
  <link rel="stylesheet" type="text/css" href="css/common.css"/>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
  <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
  <div class="topbar-inner clearfix">
    <div class="topbar-logo-wrap clearfix">
      <ul class="navbar-list clearfix">
        <li><a class="on" href="index.html">网站后台</a></li>
        <li><a href="../../../../../index.php">网站首页</a></li>
      </ul>
    </div>
    <div class="top-info-wrap">
      <ul class="top-info-list clearfix">
        <li>登录用户：<?php session_start(); echo $_SESSION["aname"]; ?></li>
        <li><a href="admin_logout.php"><i class="icon-font">&#xe9b6;</i>退出</a></li>
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
          <li><a href="/thinkphp_hotel/index.php/Admin/Order/admin_addo"><i class="icon-font">&#xe960;</i>订单入住</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/Query/admin_queryo"><i class="icon-font">&#xe986;</i>入住查询</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/History/admin_record"><i class="icon-font">&#xe986;</i>历史订单</a></li>
          <li><a href="/thinkphp_hotel/index.php/Admin/Statistical/admin_counto"><i class="icon-font">&#xe99a;</i>入住统计</a></li>
        </ul>
      </li>
      <li>
        <a >退房管理</a>
        <ul class="sub-menu">
          <li><a href="admin_checkout.php"><i class="icon-font">&#xe994;</i>退房清算</a></li>
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
          <li><a href="admin_addh.php"><i class="icon-font">&#xe995;</i>新增房间</a></li>
          <li><a href="admin_roommgr.php"><i class="icon-font">&#xe994;</i>房间管理</a></li>
        </ul>
      </li>
      <li>
        <a href="#">房类管理</a>
        <ul class="sub-menu">
          <li><a href="admin_addt.php"><i class="icon-font">&#xe995;</i>新增房类</a></li>
          <li><a href="admin_rtypemgr.php"><i class="icon-font">&#xe994;</i>房类管理</a></li>
        </ul>
      </li>
      <li>
        <a href="#">系统管理</a>
        <ul class="sub-menu">
          <li><a href="admin_chpwd.php"><i class="icon-font">&#xe991;</i>密码修改</a></li>
          <li><a href="admin_logout.php"><i class="icon-font">&#xe9b6;</i>退出系统</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
    <!--/sidebar-->
    <?php
 require("../dbconnect.php"); $sql="select a.roomid,b.typeid,b.typename,b.price from room a,roomtype b where a.typeid=b.typeid and a.roomid=".$_GET["orid"]; $arr=mysqli_query($conn,$sql); $rows=mysqli_fetch_row($arr); ?>
    <div class="main-wrap">
      <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">订单入住</span>
           &emsp;&emsp;  &emsp;&emsp;<span >当前日期：<?php error_reporting(E_ALL^E_NOTICE^E_WARNING); echo date("Y/m/d"); ?> </span>
        </div>
      </div>
      <div class="result-wrap">
        <form id="myform" name="myform" method="post" action="insert.php">
          <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="result-tab">
            <tr>
              <td width="25%" align="right" class="td_bg">房间编号：</td>
              <td width="%85" class="td_bg"> <input name="roomid" type="text" id="roomid" value="<?php echo $_GET["orid"] ?>" size="15" maxlength="20" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">类型编号：</td>
              <td class="td_bg"> <input name="typeid" type="text" id="typeid" value="<?php echo $rows[1] ?>" size="15" maxlength="20" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">类型名称：</td>
              <td class="td_bg"> <input name="typename" type="text" id="typename" value="<?php echo $rows[2] ?>" size="15" maxlength="20" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">房间价格：</td>
              <td class="td_bg"> <input name="price" type="text" id="price" value="<?php echo $rows[3] ?>" size="15" maxlength="20" />元/天</td>
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
            </tr
            <tr>
              <td align="right" class="td_bg"><input type="reset"  class="btn btn-warning" name="submit2" id="button2" value="重置" /></td>
              <td class="td_bg">
                <input type="hidden" name="action" value="inserto">
                <input type="hidden" name="_roomid" value="<?php  echo $_GET["orid"] ?>">
                <input type="hidden" name="_typeid" value="<?php  echo $rows[1] ?>">
                <input type="hidden" name="_typename" value="<?php  echo $rows[2] ?>">
                <input type="hidden" name="_price" value="<?php  echo $rows[3] ?>">
                <input type="submit" class="btn btn-info" name="submit" id="button" value="确认入住" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>