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
$totalPage = ceil($totleRows/$pageSize);
$page = $_REQUEST['page']?$_REQUEST['page']:1;
if($page<1 || $page==null || !is_numeric($page) ){
    $page = 1;
}
if($page>=$totalPage){
    $page = $totalPage;

}
$offset = ($page - 1) * $pageSize;
$sql = "select * from imooc_admin limit {$offset}, {$pageSize}";
$rows = fetchAll($sql);
foreach ($rows as $key => $row) {
    echo $row['id'] . '-----' . $row['username'];
    echo "<br>";


}
echo showPage($page, $totalPage,"cid=5&pid=6");
function showPage($page, $totalPage,$where=null, $sep="&nbsp;"){
    $where=$where==null?null:"&".$where;
    $url = $_SERVER['PHP_SELF'];
    $index = ($page == 1) ? "首页" : "<a href='{$url}?page=1{$where}'>首页</a>";
    $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
    $prev = ($page == 1) ? "上一页" : "<a href='{$url}?page=" . ($page - 1) . "{$where}'>上一页</a>";
    $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page=" . ($page + 1) . "{$where}'>下一页</a>";
    $str = "总共{$totalPage}页/当前是{$page}页";
    for ($i = 1; $i < $totalPage; $i++) {
      var_dump($i);
        if ($i == $page) {
            $p .= "[{$page}]";

        } else {
            $p .= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
        }

    }



    $pageStr = $str . $index . $sep.$prev . $sep.$p .$sep. $next.$sep . $last;
    return $pageStr;

}

