<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/4/3
 * Time: 21:54
 */


$user_current_property_id = UserInfo::user_current_property_id();

$notic_part = $_POST['notic_part'];
$notice_class = new notice_class();
$notic['find_notic'] = $notice_class->find_notic($notic_part,$user_current_property_id);
//print_r($notic);
if ($notic['find_notic']){
    $json_encode = json_encode($notic, JSON_UNESCAPED_UNICODE);
    echo $json_encode;
    return;
}
echo 0;

