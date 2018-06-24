<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/14
 * Time: 15:18
 */

//  This URL is :   https://thethreestooges.cn:5210/housemanage/son/update
$user_id=UserInfo::getUserId();
$user_current_hose_id = UserInfo::user_current_hose_id();
$housemanage_class = new housemanage_class();
$son_id = $_POST['son_id'];
$remark = $_POST['remark'];
$phone = $_POST['phone'];

$son_update = $housemanage_class->son_update($son_id, $remark, $phone,$user_current_hose_id);
echo 1;