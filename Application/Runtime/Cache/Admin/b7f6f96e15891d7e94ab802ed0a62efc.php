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
        <li>登录用户：admin</li>
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
        <div class="crumb-list"><i class="icon-font"></i><a href="/thinkphp_hotel/index.php/Admin/index">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">订单入住</span></div>
      </div>
      <center>
      <div class="search-wrap">
        <div class="search-content">
          <form action="/thinkphp_hotel/index.php/Admin/Order/manage" method="post">
            <table class="search-tab">
              <tr>
                <th >查询条件</th>
                <td>
                  <select name="search-type" id="">
                    <option value="roomid" selected>房间号码</option>
                    <option value="orderid">订单编号</option>
                    <option value="cardid">证件号码</option>
                    <option value="linkman">顾客姓名</option>
                    <option value="phone">手机号码</option>
                  </select>
                </td>
                <th width="70">关键字</th>
                <td><input class="common-text" type="text" placeholder="请输入查询条件" name="keywords" value="" id="" ></td>
                <td><input class="btn btn-primary btn2" type="submit" name="sub" value="查询订单" ></td>
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
              <th class="tc">订单流水</th>
              <th class="tc">房间号</th>
              <th class="tc">证件号</th>
              <th class="tc">入住时间</th>
              <th class="tc">离开时间</th>
              <th class="tc">房间类型</th>
              <th class="tc">联系人</th>
              <th class="tc">联系电话</th>
              <th class="tc">网上预订</th>
              <th class="tc">交易完成</th>
              <th class="tc">房间价格</th>
              <th class="tc">操&emsp;&emsp;作</th>
            </tr>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <th class="tc"><?php echo ($vo["orderid"]); ?></th>
                <th class="tc"><?php echo ($vo["roomid"]); ?></th>
                <th class="tc"><?php echo ($vo["cardid"]); ?></th>
                <th class="tc"><?php echo ($vo["entertime"]); ?></th>
                <th class="tc"><?php echo ($vo["leavetime"]); ?></th>
                <th class="tc"><?php echo ($vo["typename"]); ?></th>
                <th class="tc"><?php echo ($vo["linkman"]); ?></th>
                <th class="tc"><?php echo ($vo["phone"]); ?></th>
                <th class="tc"><?php echo ($vo["ostatus"]); ?></th>
                <th class="tc"><?php echo ($vo["oremarks"]); ?></th>
                <th class="tc"><?php echo ($vo["price"]); ?></th>
                <th class="tc">
                  <a href='/thinkphp_hotel/index.php/Admin/Order/transact/?olrid=<?php echo ($vo["roomid"]); ?>' class='link-update'>办理入住</a>
                </th>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </table>

        </div>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>