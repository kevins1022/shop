<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 下午3:05
 */
require_once '../include.php';
checkLogined();
echo $_SESSION['adminName'];
var_dump($_COOKIE);
?>
<a href="doAdminAction.php?act=logout">退出</a>