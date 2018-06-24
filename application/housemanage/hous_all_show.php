<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/3/31
 * Time: 21:32
 */


$userId = UserInfo::getUserId();
$housemanage_class = new housemanage_class();
$hous_all_show['house_list'] = $housemanage_class->hous_all_show($userId);
//print_r($hous_all_show);
if ($hous_all_show['house_list'])
    echo json_encode($hous_all_show, JSON_UNESCAPED_UNICODE);
else
    echo '{"house_list":[]}';