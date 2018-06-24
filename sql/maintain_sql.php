<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/15
 * Time: 9:53
 */
require_once dirname(__FILE__) . '/MySqlBase.php';

class maintain_sql extends MySqlBase
{
    public function select_max_num($table_name, $select_key, $where_array)
    {
        $select = "select max($select_key) ";
        $table = " from ";
        if (is_array($table_name)) {
            $table .= implode(',', $table_name);
        } else {
            $table .= $table_name;
        }
        $where = " where 1=1 ";
        if (isset($where_array)) {
            $where_key = array_keys($where_array);
            $where_value = $this->type_change(array_values($where_array));
            $where_array = array_combine($where_key, $where_value);
            foreach ($where_array as $k => $v) {
                $where .= ' and ' . $k . '=' . $v;
            }
        }
        $sql = $select . $table . $where;
        echo $sql;
        return $this->dbHandle->query($sql)->fetchAll()[0];//返回查询结果的数组
    }

    public function user_property_select($user_id)
    {
        $sql = 'SELECT current_property_id FROM property.user WHERE id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($user_id));
        $current_property_id = $PDOStatement->fetch()['current_property_id'];
        return $current_property_id;
    }

    public function indent_show_list_select($userId)
    {
        $sql = 'SELECT order_manage.order_id,c_time,indent.photo_url FROM order_manage,property.indent 
WHERE order_manage.order_id=indent.order_id AND user_id=? AND type=\'indent\' AND state in (1 or 2 or 3) ';
//        $select_sql = array('order_id', 'c_time');
//        $where_sql = array('user_id' => $userId, 'type' => 'indent', '\'1\'' => '1\' and state in (1 or 2 or 3) and \'1\'=\'1');
//        $indent_list = $this->maintain_sql->select('order_manage', $select_sql, $where_sql);
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($userId));
        $list = $PDOStatement->fetchAll();
       /* $list['list'] = '';
        foreach ($indent_list as $key => $value) {
            $list['list'][$key]['order_id'] = $value['order_id'];
            $list['list'][$key]['c_time'] = $value['c_time'];
        }*/
       return $list;
    }

    public function indent_submit_insert($indent_id,$staff_id,$staff_name,$photo_url,$remark,$part,$user_address)
    {
        $order_manage = new order_manage_class();
        $order = $order_manage->create_order('indent', 1);
        $sql='insert into indent (indent_id, staff_id, staff_name, order_id, photo_url, remark, part, address) value (?,?,?,?,?,?,?,?)';
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($indent_id,$staff_id,$staff_name,$order,$photo_url,$remark,$part,$user_address));


    }
}