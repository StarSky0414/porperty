<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/14
 * Time: 16:29
 */
$user_id=UserInfo::getUserId();
$user_current_property_id = UserInfo::user_current_property_id();

$housemanage_class = new housemanage_class();
$show_user_house['home_list'] = $housemanage_class->show_user_house($user_id,$user_current_property_id);

print_r(json_encode($show_user_house,JSON_UNESCAPED_UNICODE));