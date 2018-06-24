<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/17
 * Time: 23:37
 */

//$staff_id,$staff_name,$photo_url,$remark,$part,$address
$staff_id=$_POST['staff_id'];
$staff_name=$_POST['staff_name'];
$photo_url=$_POST['photo_url'];
$remark=$_POST['remark'];
$part=$_POST['part'];
$user_address = UserInfo::user_address();
ob_start();
$maintain_class = new maintain_class();
if ($maintain_class->indent_submit($user_address,$staff_id,$staff_name,$photo_url,$remark,$part)) {
    ob_end_clean();
    echo '1';
}else{
    ob_end_clean();
    echo '0';
}