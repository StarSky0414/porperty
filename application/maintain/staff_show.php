<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/15
 * Time: 10:15
 */

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
ob_start();
require_once dirname(__FILE__).'/maintain_class.php';
if (!isset($_POST['project_id'])){
    echo 0;
    return ;
}
$project_id = $_POST['project_id'];
$maintain_class = new maintain_class();
if ($show_project_staff = $maintain_class->show_project_staff($project_id)) {
    $jsonFormat['project_staff']=$show_project_staff;
    ob_end_clean();
    $json_encode = json_encode($jsonFormat, JSON_UNESCAPED_UNICODE);
    echo $json_encode;
}else{
    ob_end_clean();
    echo 0;
    return ;
}
