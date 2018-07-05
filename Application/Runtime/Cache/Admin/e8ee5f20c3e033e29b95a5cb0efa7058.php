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
        <div class="crumb-list"><i class="icon-font"></i><a href="/thinkphp_hotel/index.php/Admin/index">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">入住统计</span></div>
      </div>
      <div class="result-wrap">
        <div class="result-content">
        <br><br><br>
        <table border="0" width="100%">
          
          <tr>
           <hr  />
            <th class="tc"><span style="font-size: 24px;">房间统计</span></th>
          </tr>
          <tr>
            <th class="tc">
              <table class="result-tab" width="100%">
                <tr>
                  <td class="td_bg">房型总数（个）</td>
                  <td class="td_bg">床位总数（个）</td>
                  <td class="td_bg">房间总数（间）</td>
                  <td class="td_bg">房间剩余（间）</td>
                </tr>
                  <?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td class="td_bg"><?php echo ($vo["count(typeid)"]); ?></td>
                      <td class="td_bg"><?php echo ($vo["sum(bednum)"]); ?></td>
                      <td class="td_bg"><?php echo ($vo["sum(totalnum)"]); ?></td>
                      <td class="td_bg"><?php echo ($vo["sum(leftnum)"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
              </table>
            </th>
          </tr>

        </table>
        <br><br><br><br><br>
        <table border="0" width="100%">
          <tr>
            <hr  />
            <th class="tc"><span style="font-size: 24px;">营业统计</span></th>
          </tr>
          <tr>
            <th class="tc">
              <table class="result-tab" width="100%">
                <tr>
                 <td class="td_bg">订单总数（个）</td>
                  <td class="td_bg">总营业额（元）</td>
                </tr>
                <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td class="td_bg"><?php echo ($vo["count(orderid)"]); ?></td>
                    <td class="td_bg"><?php echo ($vo["sum(monetary)"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
              </table>
              <br><br><br><br><br>
            </th>
           
          </tr>
        </table>
        </div>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>