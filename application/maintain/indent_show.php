<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/4
 * Time: 13:13
 */

if (!$_POST['order_id']){
    echo 0;
    return ;
}
ob_start();
$order_id = $_POST['order_id'];
$maintain_class = new maintain_class();
$indent_show = $maintain_class->indent_show($order_id);
ob_end_clean();
if ($indent_show){
    echo json_encode($indent_show,JSON_UNESCAPED_UNICODE);
}else{
    echo 0;
}
