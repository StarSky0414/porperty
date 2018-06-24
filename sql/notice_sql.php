<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/3/20
 * Time: 17:56
 */

class notice_sql extends MySqlBase
{

    public function property_notic_list($property,$start)
    {
        $sql = 'SELECT notice_id,title,outline,create_time FROM notice WHERE property_id=? ORDER BY create_time DESC LIMIT ' . $start . ',4';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($property));
        $result = $PDOStatement->fetchAll();
        return $result;
    }

    public function getcurpro_sql($user_id)
    {
        $sql = 'select current_property_id from user WHERE id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($user_id));
        return $PDOStatement->fetch()['current_property_id'];
    }

    public function property_notic_within_list($property, $start)
    {
        $sql = 'SELECT notice_id,title,outline,create_time FROM notice WHERE property_id=? AND (date(create_time)>(date(now())-7) OR date(create_time)=(date(now())-7) ) ORDER BY create_time DESC LIMIT ' . $start . ',4';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($property));
        $result = $PDOStatement->fetchAll();
        return $result;
    }

    public function property_notic_except_list($property, $start)
    {
        $sql = 'SELECT notice_id,title,outline,create_time FROM notice WHERE property_id=? AND date(create_time)<(date(now())-7) ORDER BY create_time DESC LIMIT ' . $start . ',4';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($property));
        $result = $PDOStatement->fetchAll();
        return $result;
    }

    public function notice_info_sele($notice_id)
    {
        $sql='select title,outline,type,url_list,content,create_time from notice WHERE notice_id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($notice_id));
        $result = $PDOStatement->fetch();
        return $result;

    }

    public function find_notic_select($notic_part,$pro_id)
    {
        $sql='select notice_id,title,outline,type,url_list,content,create_time from notice WHERE property_id=? AND title LIKE ?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($pro_id,"%$notic_part%"));
        $all = $PDOStatement->fetchAll();
        return $all;
    }
}