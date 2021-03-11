<?php

/**
 * Created by PhpStorm.
 * User: 没猫撸
 * Date: 2019/12/27
 * Time: 9:26
 */
require_once __DIR__ . '/../db/DB.class.php';

class ownerDAO
{
    function isUser($obj)
    {
        try {
            $dbh = (new DB())->getDbh();//连接
            $sth = $dbh->prepare('SELECT * FROM owner_information WHERE owner_number=? AND password=?');
            $sth->execute([$obj->getOwnerNumber(),$obj->getPassword()]);;
            return $sth->fetch(PDO::FETCH_ASSOC);
            //没有结果返回FALSE，满足条件返回结果集中的下一行赶回单独的一例
        } catch (PDOException $e) {
            echo '发生PDO异常了' . $e->getMessage();
        }
        // TODO: Implement findName() method.
    }

    public function findById($owner_id)
    {
        try {
            $dbh = (new DB())->getDbh();
            $sth2 = $dbh->prepare('select plot_name from owner_information where owner_id = ?');
            $sth2->execute(array($owner_id));
            return $sth2->fetch();
        } catch (PDOException $e) {
            echo '发生PDO异常了' . $e->getMessage();
        }
        // TODO: Implement setNO() method.
    }

    public function findById2($owner_id)
    {
        try {
            $dbh = (new DB())->getDbh();
            $sth2 = $dbh->prepare('select owner_name,room from owner_information where owner_id = ?');
            $sth2->execute(array($owner_id));
            return $sth2->fetch();
        } catch (PDOException $e) {
            echo '发生PDO异常了' . $e->getMessage();
        }
        // TODO: Implement setNO() method.
    }

    public function findBill($owner_id)
    {
        try {
            $dbh = (new DB())->getDbh();
            $sth2 = $dbh->prepare('select bill,owner_number,status,owner_name,room from electricity_bill where owner_id = ?');
            $sth2->execute(array($owner_id));
            return $sth2->fetch();
        } catch (PDOException $e) {
            echo '发生PDO异常了' . $e->getMessage();
        }
        // TODO: Implement setNO() method.
    }

    public function pay($owner_id)
    {
        try {
            $dbh = (new DB())->getDbh();
            $sth2 = $dbh->prepare('UPDATE electricity_bill SET status = 1 WHERE owner_id = ?');
            $sth2->execute([$owner_id]);
        } catch (PDOException $e) {
            echo '发生PDO异常了' . $e->getMessage();
        }
        // TODO: Implement setNO() method.
    }

}