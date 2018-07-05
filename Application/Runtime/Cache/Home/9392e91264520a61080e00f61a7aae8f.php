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
        <li><a class="on" href="/thinkphp_hotel/index.php/Admin/">酒店管理</a></li>
        <li><a class="on" href="/thinkphp_hotel/index.php/Home/About/">关于我们</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container clearfix">

    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">网站首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">在线预订</span>
                &emsp;&emsp;  &emsp;&emsp;<span >当前日期：<?php error_reporting(E_ALL^E_NOTICE^E_WARNING); echo date("Y/m/d"); ?> </span>
            </div>
        </div>


        <div class="result-wrap">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form id="myform" name="myform" method="post" action="/thinkphp_hotel/index.php/Home/Onlinebook/insert">
                <table width="100%" height="180" border="1" align="center" class="result-tab">
                    <tr>
                        <td width="%45" align="right" class="td_bg">房间编号：</td>
                        <td  class="td_bg"> <input name="roomid" type="text" id="roomid" value="<?php echo ($vo["roomid"]); ?>" size="10" maxlength="20" /></td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">类型编号：</td>
                        <td class="td_bg"> <input name="typeid" type="text" id="typeid" value="<?php echo ($vo["typeid"]); ?>" size="10" maxlength="20" /></td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">类型名称：</td>
                        <td class="td_bg"> <input name="typename" type="text" id="typename" value="<?php echo ($vo["typename"]); ?>" size="10" maxlength="20" /></td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">房间价格：</td>
                        <td class="td_bg"> <input name="price" type="text" id="price" value="<?php echo ($vo["price"]); ?>" size="10" maxlength="20" />&emsp;元/天</td>
                    </tr>
                    <tr>
                        <td width="%15" align="right" class="td_bg">客户姓名：</td>
                        <td width="%85" class="td_bg"> <input name="cname" type="text" id="cname" size="10" maxlength="30" /></td>
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
                        <td class="td_bg"><input name="cardid" type="text" id="cardid" size="20" maxlength="50" /></td>
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
                        <td class="td_bg"><input type="date" value="" name="leavetime" id="leavetime" /></td>
                    </tr>
                    <tr>
                        <td align="right" class="td_bg">联系电话：</td>
                        <td class="td_bg"><input name="phone" type="text" id="phone" size="12" maxlength="50" /></td>
                    </tr>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td align="right" class="td_bg">
                            <button class="btn btn-warning"  type="reset"  name="reset"  id="post_reset" >重置</button></td>
                        <td class="td_bg">
                            <input type="hidden" name="action" value="inserto">
                            <input type="hidden" name="_roomid" value="<?php echo ($vo["roomid"]); ?>">
                            <input type="hidden" name="_typeid" value="<?php echo ($vo["typeid"]); ?>">
                            <input type="hidden" name="_typename" value="<?php echo ($vo["typename"]); ?>">
                            <input type="hidden" name="_price" value="<?php echo ($vo["price"]); ?>">
                            <button class="btn btn-info" type="submit" name="submit" id="post_order" >确认预订</button></td><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </form><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

</div>
</body>
</html>