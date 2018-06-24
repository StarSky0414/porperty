<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/5
 * Time: 1:07
 */


if(!isset($_POST['type'])||!isset($_POST['address'])||!isset($_POST['cost'])||
    !isset($_POST['cost_time'])||!isset($_POST['money'])||!isset($_POST['area'])){
    echo 5;
    return;

}
ob_start();
$type=$_POST['type'];
$address=$_POST['address'];
$cost=$_POST['cost'];
$cost_time=$_POST['cost_time'];
$money=$_POST['money'];
$area =$_POST['area'];
$order_manage = new order_manage_class();
if ($order_manage->create_payment($type, $address, $cost, $cost_time,$money, $area)) {
    ob_end_clean();
    echo 1;
    return;
}else{
    ob_end_clean();
    echo 0;
    return;
}
