<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/5
 * Time: 1:40
 */

ob_start();
$start=$_POST['start'];
$order_manage_class = new order_manage_class();
$payment_show = $order_manage_class->payment_show(((int)$start-1));
ob_end_clean();

$json_encode = json_encode($payment_show, JSON_UNESCAPED_UNICODE);
$str_replace = str_replace("null", '""', $json_encode);
echo $str_replace;