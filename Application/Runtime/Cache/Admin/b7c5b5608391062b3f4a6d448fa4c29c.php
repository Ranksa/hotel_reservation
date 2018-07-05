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
            <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">办理入住</span></div>
        </div>
        <center>
            <div class="search-wrap ">
                <div class="search-content">
                    <form action="/thinkphp_hotel/index.php/Admin/Lobby/search" method="post">
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
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <th class="tc"><?php echo ($vo["roomid"]); ?></th>
                            <th class="tc"><?php echo ($vo["typeid"]); ?></th>
                            <th class="tc"><?php echo ($vo["typename"]); ?></th>
                            <th class="tc"><?php echo ($vo["location"]); ?></th>
                            <th class="tc"><?php echo ($vo["area"]); ?></th>
                            <th class="tc"><?php echo ($vo["bednum"]); ?></th>
                            <th class="tc"><?php echo ($vo["hasfood"]); ?></th>
                            <th class="tc"><?php echo ($vo["hasnet"]); ?></th>
                            <th class="tc"><?php echo ($vo["hastv"]); ?></th>
                            <th class="tc"><?php echo ($vo["haswc"]); ?></th>
                            <th class="tc"><?php echo ($vo["price"]); ?></th>
                            <th class="tc">
                                <a href='/thinkphp_hotel/index.php/Admin/Order/add_order/?orid=<?php echo ($vo["roomid"]); ?>'  class='link-update'>办理入住</a>
                            </th>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </table>
                <div class="list-page">
                    <tr>
                        <th> <?php echo ($page); ?></th>
                        <th><br /></th>
                        <th><?php echo ($count); ?></th>

                    </tr>
                </div>

            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>