# hotel_reservation
A hotel reservation system


=============安装步骤
1、在mysql中建立一个数据库hotel，数据库编码为utf8-bin
2、将hotel.sql导入到新建的hotel数据库中
3、将www.zip中的源码解压后放在网站发布目录中即可
4、最好重启一下apache

做完上述4步后，打开浏览器，输入地址: http://localhost 即可访问浏览本酒店信息管理系统了。

=============默认用户/密码
默认后台管理员账户 admin/admin

=============特别注意
系统开发是mysql数据库的默认root用户密码为空，
如果系统部署后登陆显示“数据库连接错误”，需要修改源码dbconnect.php中的密码为实际密码。

