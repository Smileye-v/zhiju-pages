<?php

/**
 * Created by PhpStorm.
 * User: 没猫撸
 * Date: 2019/12/25
 * Time: 0:30
 */
class DB
{
    private $dbh;
    private $dbms = 'mysql';  //数据库类型
    private $host = 'localhost'; //数据库主机名
    private $dbName = 'chiju';    //使用的数据库
    private $user = 'root';      //数据库连接用户名
    private $pass = '123456';         //对应的密码

    public function __construct()
    {
        try {
            $dbh = new PDO("$this->dbms:host=$this->host;dbname=$this->dbName", $this->user, $this->pass);
            //初始化一个PDO对象
            $dbh->query('set names UTF8');//设置编码集
        } catch (PDOException $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        $this->dbh = $dbh;
    }

    public function getDbh()
    {
        return $this->dbh;
    }

}