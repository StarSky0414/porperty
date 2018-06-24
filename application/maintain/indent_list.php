<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/4
 * Time: 3:06
 */

ob_start();
$userId = UserInfo::getUserId();
$maintain_class = new maintain_class();
$indent_show_list['list'] = $maintain_class->indent_show_list($userId);
ob_end_clean();
echo json_encode($indent_show_list,JSON_UNESCAPED_UNICODE);
