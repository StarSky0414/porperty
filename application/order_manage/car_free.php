<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/27
 * Time: 21:25
 */

ob_start();
$order_manage_class = new order_manage_class();
$user_now_pro_home = $order_manage_class->user_now_pro_home(UserInfo::getUserId());
$current_hose_id = $user_now_pro_home['current_hose_id'];
$current_property_id = $user_now_pro_home['current_property_id'];
$user_home_car_free = $order_manage_class->user_home_car_free($current_property_id, $current_hose_id);
ob_clean();
if ($user_home_car_free){
    echo $user_home_car_free;
    return;
}
echo 0;
return;
