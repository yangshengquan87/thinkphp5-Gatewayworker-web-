<?php
namespace Config;

/**
 * mysql配置
 * @author walkor
 */
class Db
{
    /**
     * 数据库的一个实例配置，则使用时像下面这样使用
     * $user_array = Db::instance('db1')->select('name,age')->from('users')->where('age>12')->query();
     * 等价于
     * $user_array = Db::instance('db1')->query('SELECT `name`,`age` FROM `users` WHERE `age`>12');
     * @var array
     */
//  public static $db = array(
//      'host'    => '127.0.0.1',
//      'port'    => 3306,
//      'user'    => 'root',
//      'password' => 'root',
//      'dbname'  => 'laykefu',
//      'charset'    => 'utf8',
//  );    

	public static $db = array(
        'host'    => '47.101.54.26',
        'port'    => 3306,
        'user'    => 'root',
        'password' => '2018xysm',
        'dbname'  => 'laykefu',
        'charset'    => 'utf8',
    ); 

    //分布式变量共享组件GlobalData的ip和port
    public static $config = array(
//      'globalData'    => '127.0.0.1:2207',
		'globalData'    => '172.19.221.185:2207',
    );    

}