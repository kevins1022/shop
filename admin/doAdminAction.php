<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 下午3:18
 */
require_once '../include.php';
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];
if($act == 'logout'){
    logout();

}elseif($act == 'addAdmin'){
   $msg = addAdmin();
}elseif($act == 'editAdmin'){

    $msg = editAdmin($id);

}elseif($act == 'delAdmin'){
    $msg = delAdmin($id);

}
?>
<h1><?php echo $msg ?></h1>
