<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 下午2:58
 */
function alertMes($mes, $url){
    echo "<script>alert('{$mes}')</script>";
    echo "<script>window.location='{$url}'</script>";

}