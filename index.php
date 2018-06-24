<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/8
 * Time: 15:13
 */

//require dirname(__FILE__).'/MyPHP/FormatUrl.php';  //格式化网址
//require dirname(__FILE__).'/MyPHP/Distribute.php';

//require dirname(__FILE__).'/identity/session/makesession.php';
//require dirname(__FILE__).'/identity/session/showSession.php';
//echo dirname(__FILE__).'/identity/session/MySession.php';

//$session_id=null;
//$user_id=null;
//$session_id=$_POST['se'];
//$user_id=$_POST['ur'];
//$mySession = new MySession($session_id, $user_id);
//$SESSIONID = $mySession->getSESSIONID();

//require dirname(__FILE__).'/sql/MySqlBase.php';
//$mySqlBase = new MySqlBase();
//$a[0]['session_id']="xxxxxx";
//$a[0]['user_id']=123;
//$a[0]['create_time']=789;
//
//$a[1]['session_id']="aaaaa";
//$a[1]['user_id']=123;
//$a[1]['create_time']=789;
//
//$aa=array("session_id"=>'fff',"user_id"=>222,"create_time"=>222);
//$where['session_id']='xxxxxx';
//$a['session_id']="pppp";
//$a['user_id']=123;
//$a['create_time']=789;
//$mySqlBase->insert('session',$a);
//$select = $mySqlBase->update('session', $aa, $where);
//$mySqlBase->insert('session',$a);
//$dele = $mySqlBase->dele('session', $where);
//print_r($dele);
//ob_start();
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
//require dirname(__FILE__).'/identity/session/MySession.php';
//
//
//$mySession = new MySession();
////$mySession->make_session("123123");
//echo $mySession->read_user_id('a02d030fcf08375866cdd33c2e04c2af');
//echo 'end';
define('__KERNEL__',dirname(__FILE__).'/MyPHP/');
require_once dirname(__FILE__).'/identity/session/SessionVerify.php';
require dirname(__FILE__).'/identity/session/MySession.php';
require dirname(__FILE__).'/bean/UserInfo.php';
require __KERNEL__.'FormatUrl.php';
require __KERNEL__.'Distribute.php';

$verifySession = SessionVerify::verifySession();
UserInfo::setUserId($verifySession); ///////////////////////////用户id！！！！
if(!$verifySession){
    echo '250';
    return ;
}
UserInfo::setUserId( $verifySession);//返回用户id
$format_url = FormatUrl::format_url();
(new Distribute)->distribut($format_url);


