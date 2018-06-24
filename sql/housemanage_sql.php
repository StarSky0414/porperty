<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/14
 * Time: 0:09
 */

require_once dirname(__FILE__) . '/MySqlBase.php';

class housemanage_sql extends MySqlBase
{

    public function find_pro_list_select($userId)
    {
        $sql = 'SELECT DISTINCT
                name,
                proinfo.pro_id
                FROM pro_people_manage, homeinfo, proinfo
                WHERE
                homeinfo.home_id = pro_people_manage.home_id AND proinfo.pro_id = homeinfo.pro_id AND pro_people_manage.delete_item=0 AND pro_people_manage.user_id=?;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($userId));
        $result = $PDOStatement->fetchAll();
        return $result;
    }

    public function set_user_pro_id_update($userId, $pro_id)
    {
        $sql = 'UPDATE user SET current_property_id=? ,current_hose_id=0 WHERE id=?;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($pro_id, $userId));
    }

    public function show_user_house($user_id,$user_current_property_id)
    {
        $sql = 'SELECT homeinfo.home_id,homeinfo.address FROM pro_people_manage,homeinfo WHERE homeinfo.home_id=pro_people_manage.home_id AND user_id=? AND pro_id=?;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($user_id,$user_current_property_id));
        $result = $PDOStatement->fetchAll();
        return $result;
    }

    public function show_user_son($home_id)
    {
        $sql = 'SELECT user_id,remark,phone_num FROM pro_people_manage WHERE delete_item=0 AND home_id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($home_id));
        $result = $PDOStatement->fetchAll();
        return $result;
    }

    public function son_add_insert($user_current_hose_id, $remark, $phone, $user_id, $user_name_to_id)
    {
        $sql = 'INSERT INTO pro_people_manage (father_id, user_id, home_id, remark, phone_num) VALUES  (?,?,?,?,?);';
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($user_id, $user_name_to_id, $user_current_hose_id, $remark, $phone));
    }

    public function user_name_to_id_select($son_name)
    {
        $sql = 'SELECT id FROM property.user WHERE user=?;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($son_name));
        $result = $PDOStatement->fetch()['id'];
        return $result;
    }

    public function user_exit_sele($user_id, $home_id)
    {
//        print_r($user_id);
//        print_r($home_id);
        $sql = 'SELECT count(*) FROM pro_people_manage WHERE user_id=? AND home_id=? AND delete_item=0;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($user_id, $home_id));
        $result = $PDOStatement->fetch()['count(*)'];
        return $result;
    }

    public function delete_user_son_dele($user_id, $son_id, $user_current_hose_id)
    {
        $sql = "UPDATE pro_people_manage SET delete_item=1 WHERE father_id=? AND user_id=? AND home_id=?";
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($user_id, $son_id, $user_current_hose_id));
    }

    public function son_update_sql($son_id, $remark, $phone, $user_current_hose_id)
    {
        $sql = "UPDATE pro_people_manage SET remark=? ,phone_num=? WHERE user_id=? AND delete_item=0 AND home_id=?";
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($remark, $phone, $son_id,$user_current_hose_id));
    }

    public function set_user_home_id_update($userId, $home_id)
    {
        $sql = 'UPDATE user SET current_hose_id=? WHERE id=?;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($home_id, $userId));
    }

    public function hous_all_show_sele($user)
    {
        $sql='select home_id  from pro_people_manage WHERE user_id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($user));
        $result = $PDOStatement->fetchAll();
        return $result;
    }

    public function house_name($home_id)
    {
        $sql='select address,pro_id from homeinfo WHERE home_id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($home_id));
        $result = $PDOStatement->fetchAll()[0];
        return $result;

    }

    public function pro_name($pro_id)
    {
        $sql='select name from proinfo WHERE pro_id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($pro_id));
        $result = $PDOStatement->fetch()['name'];
        return $result;
    }


}