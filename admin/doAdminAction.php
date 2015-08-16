<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 下午3:18
 */
require_once '../include.php';
$act = $_REQUEST['act'];
if($act == 'logout'){
    logout();

}elseif($act == 'addAdmin'){
   $msg = addAdmin();
}
?>
<h1><?php echo $msg ?></h1>
