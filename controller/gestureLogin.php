<?php
/**
 * Created by PhpStorm.
 * User: 没猫撸
 * Date: 2019/12/28
 * Time: 0:38
 */
require_once '../model/owner.class.php';
require_once '../model/ownerDAO.class.php';

$username = isset($_POST['owner_number']) ? trim($_POST['owner_number']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
//    echo $username;
$account = new owner();
$account->setOwnerNumber($username);
$account->setPassword($password);
$res = (new ownerDAO())->isUser($account);
if ($res){
    echo 1;
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['id'] = $res['owner_id'];
}