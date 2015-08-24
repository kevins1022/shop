<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 下午8:43
 */
require_once '../include.php';
$pageSize = 2;
$page = $_REQUEST['page']?$_REQUEST['page']:1;
if($page<1 || !is_numeric($page) || $page == null){
    $page = 1;

}
$sql = "select * from imooc_admin";
$total = getResultNum($sql);


$offSet = ($page-1)*$pageSize;
if($page>$totalPage) $page = $totalPage;
$totalPage = ceil($total/$pageSize);
//$sql = "select * from imooc_admin limit {$offSet}, {$pageSize}";
//$rows = fetchAll($sql);
//if($rows<$total){
//    echo showPage($page, $totalPage);
//
//}
echo showPage($page, $totalPage);
die();
//$rows = getAllAdmin();

echo "<table>";
foreach($rows as $key=>$value){
    echo "<tr><td>{$value['id']}</td>
                <td>{$value['username']}</td>
                <td>{$value['email']}</td>
                <td><a href='editAdmin.php?id={$value['id']}'>修改</a></td>
                <td><a href='doAdminAction.php?act=delAdmin&id={$value['id']}'>删除</a></td>

            </tr>";
    //echo "<br>";

}
echo "</table>";

?>
