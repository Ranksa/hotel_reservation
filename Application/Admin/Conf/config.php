<?php
return array(
	//'配置项'=>'配置值'
    //SITE_URL
    'TMPL_PARSE_STRING'  =>array(
        '__PUBLIC__' => SITE_URL.'/Application/Admin/Public'// 更改默认的/Public 替换规则

    ),
    'URL_CASE_INSENSITIVE' => true ,
    //  'TMPL_ENGINE_TYPE' =>'PHP'

    //数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'hotel', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'root', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

);