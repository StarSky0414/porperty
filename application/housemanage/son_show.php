<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/14
 * Time: 1:28
 */
$user_id=UserInfo::getUserId();
$user_current_hose_id = UserInfo::user_current_hose_id();
if ($user_current_hose_id==0){
    echo 0;
    return;
}
$housemanage_class = new housemanage_class();
$show_user_son = $housemanage_class->show_user_son($user_current_hose_id);
$jsonFormat['son_show']=$show_user_son;
$json_encode = json_encode($jsonFormat, JSON_UNESCAPED_UNICODE);
$str_replace = str_replace("null", '""', $json_encode);
echo $str_replace;