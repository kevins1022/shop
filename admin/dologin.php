<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 下午2:14
 */
require_once '../include.php';
extract($_POST);
$password = md5($password);
$verify1 = $_SESSION['verify'];

if($verify == $verify1){
    $sql = "select * from imooc_admin where username ='{$username}' and password ='{$password}'";
    $row = checkAdmin($sql);
    if($row){
        if($autoFlag){
            setcookie('adminId', $row['id'], time()+7*24*3600);
            setcookie('adminName', $row['username'], time()+7*24*3600);
            var_dump($_COOKIE);

        }
        $_SESSION['adminName']=$row['username'];
        $_SESSION['adminId']=$row['id'];
        //header("location:index.php");
        alertMes('验证成功','index.php');

    }else{
        alertMes('登录失败，请重新登录','login.php');
    }
}else{
    alertMes("验证码错误",'login.php');

}