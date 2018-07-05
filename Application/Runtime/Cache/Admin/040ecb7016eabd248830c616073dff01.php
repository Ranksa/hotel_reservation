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
          <li><a class="on" href="admin_index.php">网站后台</a></li>
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
  <div class="container  clearfix">
     <div class="sidebar-wrap">
      <div class="sidebar-title">
        <h1>预订菜单</h1>
      </div>
      <div class="sidebar-content">
        <ul class="sidebar-list">
          <li>

            <a >入住管理</a>
            <ul class="sub-menu">
              <li><a href="index.html"><i class="icon-font">&#xe960;</i>办理入住</a></li>
              <li><a href="admin_addo.php"><i class="icon-font">&#xe960;</i>订单入住</a></li>
              <li><a href="admin_queryo.php"><i class="icon-font">&#xe986;</i>入住查询</a></li>
                 <li><a href="admin_record.php"><i class="icon-font">&#xe986;</i>历史订单</a></li>
              <li><a href="admin_counto.php"><i class="icon-font">&#xe99a;</i>入住统计</a></li>
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


    <div class="main-wrap">
      <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">办理入住</span></div>
      </div>
      <center>
        <div class="search-wrap ">
        <div class="search-content">
          <form action="index.html" method="post">
            <table class="search-tab">
              <tr>
                <th width="0">查询条件</th>
                <td>
                  <select name="search-type" id="">
                    <option value="typename" selected>单/双/标/豪/商务人间</option>
                  </select>
                </td>
                <th width="70">关键字</th>
                <td><input class="common-text" placeholder="请输入查询条件" name="keywords" value="" id="" type="text"></td>
                <td><input class="btn btn-primary btn2" name="sub" value="查询空闲房间" type="submit"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      </center>

      <div class="result-wrap">
        <div class="result-content">
          <table class="result-tab" width="100%">
            <tr>
              <th class="tc">房间编号</th>
              <th class="tc">类型编号</th>
              <th class="tc">类型名称</th>
              <th class="tc">房间位置</th>
              <th class="tc">房间面积</th>
              <th class="tc">床位数量</th>
              <th class="tc">早餐</th>
              <th class="tc">网络</th>
              <th class="tc">电视</th>
              <th class="tc">浴室</th>
              <th class="tc">价格</th>
              <!--th class="tc">剩余数量</th-->
              <th class="tc">操&emsp;&emsp;作</th>
            </tr>

          </table>
          <div class="list-page ">
            <tr>
              <?php
 if($pageno==1) { echo "首页 | 上一页 | <a href='?pageno='".($pageno+1).">下一页</a> | <a href='?pageno'=".$_POST['search-type']."'>末页</a>"; } else if($pageno==$pagecount) { echo "<a href='?pageno=1'>首页</a> | <a href='?pageno='".($pageno-1)."'>上一页</a> | 下一页 | 末页"; } else { echo "<a href='?pageno=1'>首页</a> | <a href='?pageno='".($pageno-1)."'>上一页</a> | <a href='?pageno='".($pageno+1)." class='list_page''>下一页</a> | <a href='?pageno='".$pagecount.">末页</a>"; } echo "&nbsp;页次：".$pageno."/".$pagecount."页&nbsp;共有".$recordcount."条信息"; ?>
            </tr>
          </div>
        </div>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>