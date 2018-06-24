<?php


/**
 * 暂未使用
 */
/*ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);*/
/*
require dirname(__FILE__).'/../../mysql/mysql_housename.php';
require dirname(__FILE__).'/../tool/session/session.php';
require dirname(__FILE__).'/../../config/config.php';

if($userid= Session::read_session($_GET['sen'])){
    return ;
}
if(isset($_GET['keyt'])){
    $kety=$_GET['keyt'];
} else {
    return ;
}
echo $_GET['keyt'];
$mysql= new MySql_housename();
echo $kety;
list($pro_name,$key)= split( '@',$kety);
echo $pro_name;
$temp=$mysql->find_keyt($pro_name);
if(isset($temp)){
    if($temp==$key){
        $mysql->keyt_success($userid, $key, $pro_name);
    }
}else{
    return;
}
    


*/
