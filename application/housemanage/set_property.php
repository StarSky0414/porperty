<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/29
 * Time: 18:33
 */

$pro_id = $_POST['pro_id'];
$userId = UserInfo::getUserId();
$housemanage_class = new housemanage_class();
if ($housemanage_class->set_user_pro_id($userId,$pro_id)) {
    echo 1;
    return;
}
echo 0;
return;