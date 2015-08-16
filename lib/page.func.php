<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 上午11:25
 */
require_once '../include.php';
$sql = "select * from imooc_admin";
$totleRows = getResultNum($sql);
$pageSize = 2;
$totlePage = ceil($totleRows/$pageSize);
$page = $_REQUEST['page']?$_REQUEST['page']:1;
if($page<1 || $page==null || !is_numeric($page) ){
    $page = 1;
}
if($page>=$totlePage){
    $page = $totlePage;

}
$url = $_SERVER['PHP_SELF'];
$offset = ($page -1)*$pageSize;
$sql = "select * from imooc_admin limit {$offset}, {$pageSize}";
$rows = fetchAll($sql);
foreach($rows as $key => $row){
    echo $row['id'].'-----'.$row['username'];
    echo "<br>";


}
$index = ($page==1)?"首页":"<a href='{$url}?page=1'>首页</a>";
$last = ($page==$totlePage)?"尾页":"<a href='{$url}?page={$totlepage}'>尾页</a>";

for($i=1;$i<$totlePage;$i++){
    if($i==$page){
        $p.="[{$page}]";

    }else{
        $p.="<a href='{$url}?page={$i}'>[{$i}]</a>";
    }

}
echo $p;
