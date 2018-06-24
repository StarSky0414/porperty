<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/3
 * Time: 23:51
 */

class order_manage_sql extends MySqlBase
{
    public function  select_limit($table_name, $select_array, $where_array,$start){
        $select="select ";
        $table=" from ";
        if (is_array($table_name)){
            $table.=implode(',',$table_name);
        }else{
            $table.=$table_name;
        }
        $where=" where 1=1 ";
        $array_values = array_values($select_array);
        $select.=implode(',',$array_values);
        if(isset($where_array)){
            $where_key=array_keys($where_array);
            $where_value=$this->type_change(array_values($where_array));
            $where_array = array_combine($where_key, $where_value);
            foreach ($where_array as $k=>$v) {
                $where.=' and '.$k.'='.$v;
            }
        }
        $sql=$select.$table.$where.' order by order_id ASC limit '.((int)$start*5).',5';
        echo $sql;
        return $this->dbHandle->query($sql)->fetchAll();//返回查询结果的数组
    }
}