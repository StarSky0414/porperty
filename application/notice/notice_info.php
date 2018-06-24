<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/3/20
 * Time: 19:27
 */


$notice_id = $_POST['notice_id'];
$notice_class = new notice_class();
$notic_info = $notice_class->notic_info($notice_id);
echo json_encode($notic_info,JSON_UNESCAPED_UNICODE);