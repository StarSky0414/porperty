<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/18
 * Time: 10:09
 */
ob_start();
$maintain_class = new maintain_class();
$user_address1 = UserInfo::user_address();
//$user_address = $maintain_class->user_address(UserInfo::getUserId());
if (isset($user_address)){
    $result['address']=$user_address;
    ob_end_clean();
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
    return;
}else{
    ob_end_clean();
    echo '0';
    return;
}