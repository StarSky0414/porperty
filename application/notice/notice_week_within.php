<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/3/20
 * Time: 18:55
 */

$start = $_POST['start'];
$userId = UserInfo::getUserId();
$notice_class = new notice_class();
$notic_list['notice_list'] = $notice_class->notic_list_within($userId, $start);
if (empty($notice_class)){
    echo 0;
    return;
}
echo json_encode($notic_list,JSON_UNESCAPED_UNICODE);