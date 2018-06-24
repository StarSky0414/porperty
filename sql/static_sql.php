<?php
/**
 * Created by PhpStorm.
 * User: luojunyuan
 * Date: 18-4-10
 * Time: 下午5:12
 */


require_once dirname(__FILE__).'/MySqlBase.php';
class static_sql extends MySqlBase
{

    public function big_project(){
        $sql="select * from big_project ;";
        return $this->dbHandle->query($sql)->fetchAll();
    }

    public function small_project($big){
        $sql="select * from small_project where big_id =$big;";
        //echo $sql;
        return $this->dbHandle->query($sql)->fetchAll();
    }

    public function __destruct() {
        $this->dbHandle=NULL;
    }
}