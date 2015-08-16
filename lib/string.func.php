<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/15
 * Time: 下午12:50
 */
/**
 *生成随即字符串
 * @param int $type
 * @param int $length
 * @return string
 */
function bulidRandomString($type=1, $length=4){
    if($type == 1){
        $chars = join("", range(0, 9));
    }elseif($type == 2){
        $chars = join("", array_merge(range("a", "z"), range("A", "Z")));
    }elseif($type == 3){
        $chars = join("",array_merge(range('a', 'z'), range('A', 'Z'), range(0,9)));
    }
    if($length>strlen($chars)){
        exit("字符串长度不够");
    }
    $chars = str_shuffle($chars);
    $chars = substr($chars,0,$length);
    return $chars;

}










