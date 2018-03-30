<?php

function db_access($db,$sql){

    $link = mysql_connect("localhost","db_user","db_pass")or die("MySQLサーバへの接続に失敗しました。");
    mysql_select_db($db,$link)or die($db."の選択に失敗しました。");
    $result = mysql_query($sql,$link)or die("SQL文「".$sql."」の発行に失敗しました。");
    return $result;

}

function user_check($user,$pass){

    $sql = "SELECT name, password FROM user where name = '".$user."' password = '".$pass."';";
    $flag = mysql_num_rows(db_access("bbs", $sql)) == 1;
    return $flag;

}

function register_validation(){
    return true;
}
?>