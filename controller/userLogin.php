<?php
/**
 * Created by PhpStorm.
 * User: 没猫撸
 * Date: 2019/12/27
 * Time: 9:28
 */
require_once '../model/owner.class.php';
require_once '../model/ownerDAO.class.php';
if ($_POST) {
    $username = isset($_POST['owner_number']) ? trim($_POST['owner_number']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
//    echo $username;
    $account = new owner();
    $account->setOwnerNumber($username);
    $account->setPassword($password);
    $res = (new ownerDAO())->isUser($account);
//echo $username;echo $password;
    if ($res) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['id'] = $res['owner_id'];

        echo '<script language="javascript">';
        echo 'localStorage.clear();    ';
        $re = ['owner_number' => $username];
        echo 'localStorage.setItem("data",JSON.stringify(' . json_encode($re) . '));';//将用户账号存储进localStorage里，用户可进行手势验证
        echo 'location.href="../home.php"';
        echo '</script>';

//print_r($re) ;
//        header('Location:../home.php');
    } else {
//       echo "<script>setTimeout(function(){
//    alert('用户名或密码错误，请重新登录';)"
//     header( 'Location:..\login.html');
//        echo "}</script>";
        echo '<script language="javascript">';
        echo 'alert("用户名或密码错误，请重新登录");';
        echo "location.href='../login.html'";
        echo '</script>';
    }

}