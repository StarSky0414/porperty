<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/11
 * Time: 21:27
 */
require_once dirname(__FILE__).'/../sql/MySqlBase.php';
class UserInfo extends MySqlBase
{
    private static $user_id;

    /**
     * @return mixed
     */
    public static function getUserId()
    {
        return self::$user_id;
    }

    /**
     * @param mixed $user_id
     */
    public static function setUserId($user_id)
    {
        self::$user_id = $user_id;
    }

    public static function user_current_hose_id()
    {
        $mySqlBase = new MySqlBase();
        $PDOStatement = $mySqlBase->dbHandle->prepare("select current_hose_id from user WHERE id=?;");
        $PDOStatement->execute(array(self::getUserId()));
        $current_hose_id = $PDOStatement->fetch()['current_hose_id'];
        return $current_hose_id;
    }
    public static function user_current_property_id()
    {
        $mySqlBase = new MySqlBase();
        $PDOStatement = $mySqlBase->dbHandle->prepare("select current_property_id from user WHERE id=?;");
        $PDOStatement->execute(array(self::getUserId()));
        $current_hose_id = $PDOStatement->fetch()['current_property_id'];
        return $current_hose_id;
    }

    public static function user_address()
    {
        $userId = UserInfo::getUserId();
        $mySqlBase = new MySqlBase();
        $sql='select address  from user,homeinfo where id=? and current_hose_id=home_id';
        $PDOStatement = $mySqlBase->dbHandle->prepare($sql);
        $PDOStatement->execute(array($userId));
        $PDOStatement->fetch()['address'];
    }
}