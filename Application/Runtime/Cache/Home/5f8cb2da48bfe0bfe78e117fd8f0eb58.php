<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>酒店管理系统</title>
    <link rel="stylesheet" type="text/css" href="http://localhost:8088/thinkphp_hotel/Application/Home/Public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8088/thinkphp_hotel/Application/Home/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost:8088/thinkphp_hotel/Application/Home/Public/css/main.css"/>
    <script type="text/javascript" src="http://localhost:8088/thinkphp_hotel/Application/Home/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="http://localhost:8088/thinkphp_hotel/Application/Home/Public/js/check_input.js"></script>
    <script type="text/javascript" src="http://localhost:8088/thinkphp_hotel/Application/Home/Public/js/jquery.js"></script>
</head>
<body>
<div class="topbar-wrap white">
  <div class="topbar-inner clearfix">
    <div class="topbar-logo-wrap clearfix">
      <ul class="top-info-list clearfix">
        <li><a class="on" href="/thinkphp_hotel/index.php/Home/index">首页</a></li>
        <li><a class="on" href="/thinkphp_hotel/index.php/Home/Onlinebook/">在线预订</a></li>
        <li><a class="on" href="/thinkphp_hotel/index.php/Home/Search/">订单查询</a></li>
      </ul>
    </div>
    <div class="top-info-wrap">
      <ul class="top-info-list clearfix">
        <li><a class="on" href="/thinkphp_hotel/index.php/Admin/Index/login">酒店管理</a></li>
        <li><a class="on" href="/thinkphp_hotel/index.php/Home/About/">关于我们</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container clearfix">

    <!--/sidebar-->
    <div >
        <div class="crumb-wrap">
            <div class="crumb-list">
                <a href="/thinkphp_hotel/index.php/Home/index/">网站首页</a>
                <span class="crumb-step">&gt;</span>
                <span >在线预订</span>
                <!--         </div> -->
            </div>
            <div class="search-wrap">
                <div class="search-content">
                    <form action="/thinkphp_hotel/index.php/Home/Onlinebook/Onlinebook" method="post">
                        <table class="search-tab" >
                            <tr>
                                <th width="240" >查询条件:</th>
                                <td>
                                    <select name="search-type" id=""  >
                                        <option value="typename" selected>单/双/标/豪人</option>

                                    </select>
                                </td>
                                <th width="100">关键字:</th>
                                <td><input class="common-text"   type="text" placeholder="请输入查询条件" name="keywords"  ></td>
                                <td ><input class="btn btn-primary btn-sm " type="submit" name="sub" value="查询空闲房间" ></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>


            <div class="result-wrap">
                <div class="result-content">
                    <table class="result-tab table" width="100%">
                        <tr>

                            <th class="tc">类型名称</th>
                            <th class="tc">房间面积</th>
                            <th class="tc">床位数量</th>
                            <th class="tc">早餐</th>
                            <th class="tc">网络</th>
                            <th class="tc">电视</th>
                            <th class="tc">独卫</th>
                            <th class="tc">价格</th>
                            <th class="tc">房间号</th>
                            <th class="tc">操&emsp;&emsp;作</th>
                        </tr>
                    </table>

                    </div>
                </div>
            </div>

        </div>
        <!--/main-->
    </div>
</body>
</html>