<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/5
 * Time: 4:31
 */

if(!isset($_POST['order_id'])){
    echo 0;
    return;
}
ob_start();
$order_id = $_POST['order_id'];
$order_manage_class = new order_manage_class();
$payment_info['paymentinfo'] = $order_manage_class->payment_info($order_id);
ob_end_clean();
if ($payment_info){
    echo json_encode($payment_info,JSON_UNESCAPED_UNICODE);
}else {
    echo 0;
}