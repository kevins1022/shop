<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 下午9:24
 */
    require_once '../include.php';
    $id = $_REQUEST['id'];
    $sql = "select username, password, email from imooc_admin where id={$id}";
    //echo $sql;
    $row = fetchOne($sql);

?>
<form action="doAdminAction.php?act=addAdmin" method="post">
    管理员用户名<input type="text" name="username" value="<?php echo $row['username'] ?>"/>
    <br/>
    管理员密码 <input type="text" name="password" value="<?php echo $row['password'] ?>"/>
    <br/>

    管理员邮箱 <input type="text" name="email" value="<?php echo $row['email'] ?>"/>
    <br/>

    <input type="submit" value="确定"/>

</form>