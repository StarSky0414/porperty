<?php


$userId = UserInfo::getUserId();
$housemanage_class = new housemanage_class();
$result = $housemanage_class->find_pro_list($userId);
if (!empty($result)){
    $pro_list['pro_list']=$result;
    $show_user_pro = json_encode($pro_list,JSON_UNESCAPED_UNICODE);
    echo $show_user_pro;
    return;
}
echo '{"pro_list":[]}';