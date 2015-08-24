<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 下午2:18
 */
/**
 * 判断管理员登录
 * @param $sql
 * @return multitype
 */
function checkAdmin($sql){
    return fetchOne($sql);

}

/**
 * 检测管理员是否登录
 */
function checkLogined(){
    if(@$_SESSION['adminId']=='' && $_COOKIE['adminId']==''){
        alertMes("请登录",'login.php');

    }
}

/**
 * 管理员注销操作
 */
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

/**
 * 管理员添加操作
 * @return string
 */
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

/**
 * 获取所有管理员
 * @return multitype
 */
function getAllAdmin(){
    //$where = $where==null?null:$where;
    $sql = "select id,username,email from imooc_admin";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 修改管理员
 * @param $id
 * @return string
 */
function editAdmin($id){
    $arr = $_POST;
    $arr['password'] = md5($arr['password']);
    if(update('imooc_admin',$arr, "id=$id")){
        $msg = "修改成功";
    }else{
        $msg = "修改失败";
    }
    return $msg;

}
function delAdmin($id){
    if(delete("imooc_admin", "id={$id}")){
        $msg = "删除成功";

    }else{
        $msg = "删除失败";
    }
    return $msg;

}