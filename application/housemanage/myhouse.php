<?php

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
require dirname(__FILE__).'/../../mysql/mysql_housename.php';


$user_id=1;
$mysql=new MySql_housename();
print_r(json_encode($mysql->find_pro($user_id),JSON_UNESCAPED_UNICODE));
