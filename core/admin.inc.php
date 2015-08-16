<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 下午2:18
 */
function checkAdmin($sql){
    return fetchOne($sql);

}
function checkLogined(){
    if(@$_SESSION['adminId']=='' && $_COOKIE['adminId']==''){
        alertMes("请登录",'login.php');

    }
}
function logout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);

    }
    if(isset($_COOKIE['adminId'])){
        setcookie('adminId','',time()-1);

    }
    if(isset($_COOKIE['adminName'])){
        setcookie('adminName','',time()-1);


    }
    session_destroy();
    header("location:login.php");

}
function addAdmin(){
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if(insert('imooc_admin', $arr)){
       $msg = "添加成功";

    }else{
        $msg = "添加失败";
    }

    return $msg;

}
function getAllAdmin(){
    $sql = "select id,username,email from imooc_admin";
    $rows = fetchAll($sql);
    return $rows;
}