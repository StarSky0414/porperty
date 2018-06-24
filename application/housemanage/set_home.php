<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/30
 * Time: 18:28
 */

$home_id = $_POST['home_id'];
$userId = UserInfo::getUserId();
$housemanage_class = new housemanage_class();
if ($housemanage_class->set_user_home_id($userId,$home_id)) {
    echo 1;
    return ;
}
echo 0;
return;
