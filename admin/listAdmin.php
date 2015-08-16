<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 下午8:43
 */
require_once '../include.php';
$rows = getAllAdmin();
echo "<table>";
foreach($rows as $key=>$value){
    echo "<tr><td>{$value['id']}</td>
                <td>{$value['username']}</td>
                <td>{$value['email']}</td>
            </tr>";
    //echo "<br>";

}
echo "</table>";

?>
