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
    <div class="main-wrap">
      <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">入住查询</span></div>
      </div>
      <center>
      <div class="search-wrap">
        <div class="search-content">
          <form action="admin_record.php" method="post">
            <table class="search-tab">
              <tr>
                <th>查询条件</th>
                <td>
                  <select name="search-type" id="">
                    <option value="roomid" selected>房间号</option>
                    <option value="orderid" >订单号</option>
                    <option value="cardid">证件号</option>
                    <option value="linkman">姓名</option>
                    <option value="phone">联系电话</option>
                  </select>
                </td>
                <th width="70">关键字</th>
                <td><input class="common-text" placeholder="请输入相应关键字" name="keywords" value="" id="" type="text"></td>
                <td><input class="btn btn-primary btn2" name="sub" value="查询入住" type="submit"></td>
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
              <th class="tc">网上预定</th>
              <th class="tc">完成交易</th-->
            </tr>
            <?php
 $pagesize=20; $sql = "select a.orderid,a.roomid,a.cardid,a.entertime,a.leavetime,b.typename,a.linkman,a.phone,a.ostatus,a.oremarks from record a,roomtype b where a.typeid=b.typeid and a.".@$_POST["search-type"]." like ('%".@$_POST["keywords"]."%')"; $rs=mysqli_query($conn,$sql); if(!$rs) { echo "<br />"; echo "<span style=margin-left:200px>无满足条件的记录！</span>"; exit; } $recordcount=mysqli_num_rows($rs); $pagecount=($recordcount-1)/$pagesize+1; $pagecount=(int)$pagecount; $pageno=@$_GET["pageno"]; if($pageno=="") { $pageno=1; } if($pageno<1) { $pageno=1; } if($pageno>$pagecount) { $pageno=$pagecount; } $startno=($pageno-1)*$pagesize; $sql="select a.orderid,a.roomid,a.cardid,a.entertime,a.leavetime,b.typename,a.linkman,a.phone,a.ostatus,a.oremarks from record a,roomtype b where a.typeid=b.typeid and a.".$_POST["search-type"]." like ('%".$_POST["keywords"]."%') order by a.orderid desc limit $startno,$pagesize"; $rs=mysqli_query($conn,$sql); if(!$rs) { echo "<br />"; echo "<span style=margin-left:200px>无满足条件的记录！</span>"; exit; } while($rows=mysqli_fetch_assoc($rs)) { echo "<tr>"; echo "<th class='tc'>".$rows["orderid"]."</th>"; echo "<th class='tc'>".$rows["roomid"]."</th>"; echo "<th class='tc'>".$rows["cardid"]."</th>"; echo "<th class='tc'>".$rows["entertime"]."</th>"; echo "<th class='tc'>".$rows["leavetime"]."</th>"; echo "<th class='tc'>".$rows["typename"]."</th>"; echo "<th class='tc'>".$rows["linkman"]."</th>"; echo "<th class='tc'>".$rows["phone"]."</th>"; echo "<th class='tc'>".$rows["ostatus"]."</th>"; echo "<th class='tc'>".$rows["oremarks"]."</th>"; echo "</tr>"; } ?>
          </table>
          <div class="list-page">
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