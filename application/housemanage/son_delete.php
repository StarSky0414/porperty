<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/14
 * Time: 16:04
 */

$user_id=UserInfo::getUserId();
$user_current_hose_id = UserInfo::user_current_hose_id();
$housemanage_class = new housemanage_class();
$son_id = $_POST['son_id'];
if(isset($son_id)){
    $housemanage_class->delete_user_son($user_id,$son_id,$user_current_hose_id);
    echo 1;
    return ;
}else{
    echo 0;
    return ;
}