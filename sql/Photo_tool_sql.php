<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/16
 * Time: 11:39
 */
require_once dirname(__FILE__) . '/MySqlBase.php';

class Photo_tool_sql extends MySqlBase
{
    private $TABLE = 'photo_manage';
    private $field_mer_id = 'mer_id';
    private $field_pho_name = 'pho_name';
    private $field_pho_type = 'pho_type';
    private $field_pho_url = 'pho_url';

    public function max_photo_name_all ()
    {
        $sql = "SELECT max( pho_name ) FROM photo_manage ;";
        $mysql = $this->dbHandle->prepare($sql);
        $mysql->execute();
        return $mysql->fetch()['max( pho_name )'];
    }

    public function insert_photo($mer_id,$pho_name,$pho_type,$pho_url){
        $insert_sql=array($this->field_mer_id=>$mer_id,$this->field_pho_name=>$pho_name,
            $this->field_pho_type=>$pho_type,$this->field_pho_url=>$pho_url);
        $result = $this->insert($this->TABLE, $insert_sql);
        return $result;
    }
}