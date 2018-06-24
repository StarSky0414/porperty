<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/22
 * Time: 23:50
 */
require_once dirname(__FILE__).'/../../Tool/Push.php';
$num = $_POST['num'];
$tag = $_POST['tag'];
Push::push_message('ACCOUNT',$tag,"{\"name\":\"Hello\"}");
Push::push_notice('ACCOUNT',$tag,"","{\"name\":\"Hello\"}",'bbvv','bb');
echo 1;
