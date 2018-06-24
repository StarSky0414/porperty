<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/14
 * Time: 14:52
 */

$user_id=UserInfo::getUserId();
//$son_id = $_POST['son_id'];
$remark = $_POST['remark'];
$phone = $_POST['phone'];
$son_name=$_POST['son_name'];

$user_current_hose_id = UserInfo::user_current_hose_id();
$housemanage_class = new housemanage_class();
$son_add = $housemanage_class->son_add($user_current_hose_id, $remark, $phone, $user_id, $son_name);
if ($son_add){
    echo 1;
    return ;
}
echo 0;
