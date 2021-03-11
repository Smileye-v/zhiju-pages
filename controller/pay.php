<?php
/**
 * Created by PhpStorm.
 * User: 没猫撸
 * Date: 2020/1/2
 * Time: 10:50
 */
require_once '../model/ownerDAO.class.php';
session_start();
$res = (new ownerDAO())->pay($_SESSION['id']);
header('location:../success.html');