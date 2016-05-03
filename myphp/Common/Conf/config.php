<?php
return array(
	//'配置项'=>'配置值'
/*    'db_type'  => 'mysql',
    'db_user'  => 'ws',
    'db_pwd'   => '123456',
    'db_host'  => '192.168.1.169',
    'db_port'  => '3306',
    'db_name'  => 'ssm',
     'DB_PREFIX'    =>  'test_',     // 数据库表前缀
    'db_charset'=>    'utf8',*/


    'SHOW_PAGE_TRACE'=>True,

    'URL_CASE_INSENSITIVE' => true, // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL' => 2, // URL访问模式,可选参数0、1、2、3,代表以下四种模式：

    //'配置项'=>'配置值'
    'DB_DSN' => '', // 数据库连接DSN 用于PDO方式
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => '192.168.1.169', // 服务器地址
    'DB_NAME' => 'ssm', // 数据库名
    'DB_USER' => 'ws', // 用户名
    'DB_PWD' => '123456', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => 'think_', // 数据库表前缀

    'AUTH_CONFIG' => array(
        'AUTH_ON' => true, //认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => 'think_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'think_auth_group_access', //用户组明细表
        'AUTH_RULE' => 'think_auth_rule', //权限规则表
        'AUTH_USER' => 'think_user'//用户信息表
    )
);