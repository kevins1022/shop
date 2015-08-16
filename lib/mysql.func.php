<?php
/**
 * Created by PhpStorm.
 * User: ning-pc
 * Date: 15/8/16
 * Time: 上午11:25
 */
/**
 * 连接数据库
 * @return resource
 */
function connect(){
    $link = mysql_connect(DB_HOST, DB_USER, DB_PWD) or die(mysql_error() . mysql_errno());
    mysql_set_charset(DB_CHARSET);
    mysql_select_db(DB_NAME) or die("数据库打开失败".mysql_error());
    return $link;
}

/**
 * @param $table
 * @param $array
 * @return int
 */
function insert($table,$array){
    $keys = join(",", array_keys($array));
    $values = "'".join("','", array_values($array))."'";
    $sql = "insert into {$table}($keys) VALUES ({$values})";
   // echo $sql;
    mysql_query($sql);
    return mysql_insert_id();

}

/**
 * @param $table
 * @param $array
 * @param null $where
 * @return int
 */
function update($table, $array,$where=null){
    foreach ($array as $key => $value) {
        if($str==null){
            $sep = '';

        }else{
            $sep=',';
        }
        $str = $sep.$key."='".$value."'";

    }

    $sql = "update {$table} set {$str}". ($where==null?null:"where".$where);
    mysql_query($sql);

    return mysql_affected_rows();


}

/**
 * @param $table
 * @param null $where
 * @return int
 */
function delete($table, $where=null){
    $where=$where==null?null:"where".$where;
    $sql = "delete from {$table} {$where}";
    mysql_query($sql);
    return mysql_affected_rows();

}

/**
 * @param $sql
 * @param string $res_type
 * @return multitype
 */
function fetchOne($sql,$res_type=MYSQL_ASSOC){
    $res = mysql_query($sql);
    $row =mysql_fetch_array($res, $res_type);
    return $row;
}

/**
 * @param string $sql
 * @param string $res_type
 * @return multitype
 */
function fetchAll($sql, $res_type=MYSQL_ASSOC){
    $res = mysql_query($sql);
    while(@$row=mysql_fetch_array($res, $res_type)){
        $rows[] = $row;

    }
    return $rows;

}

/**
 * @param $sql
 * @return int
 */
function getResultNum($sql){
    $res = mysql_query($sql);
    return mysql_num_rows($res);

}
