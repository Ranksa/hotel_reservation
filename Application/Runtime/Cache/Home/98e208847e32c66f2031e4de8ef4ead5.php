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
    <div class="">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/thinkphp_hotel/index.php/Home/index/">网站首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">订单查询</span></div>
        </div>
        <center>
            <div class="search-wrap">
                <div class="search-content">
                    <form action='/thinkphp_hotel/index.php/Home/Search/order_query' method='post'>
                    <table class='search-tab'>
                    <tr>
                        <th width='120'>查询条件:</th>
                       <td>
                            <select name='search-type' id=''>
                                <option value='cardid' selected>证件号</option>
                                <option value='phone'>联系电话</option>
                                </select>
                       </td>
                        <th width='70'>关键字:</th>
                        <td><input class='common-text' placeholder='请输入相应关键字' name='keywords' value='' id='' type='text'></td>
                        <td><input class='btn btn-primary btn2' name='sub' value='查询' type='submit'></td></tr>
                    </tr>

                    </table>
                    </form>

            </div>
        </center>
    </div>

    <div class="result-wrap">
        <div class="result-content">
            <table class="result-tab" width="100%">
                <tr>

                    <th class="tc">房间号</th>
                    <th class="tc">入住时间</th>
                    <th class="tc">离开时间</th>
                    <th class="tc">房间类型</th>
                    <th class="tc">联系人</th>
                    <th class="tc">联系电话</th>
                    <th class="tc">网上预定</th>
                    <th class="tc">完成交易</th>
                </tr>


            </table>

        </div>
    </div>
</div>
<!--/main-->
</div>
</body>
</html>