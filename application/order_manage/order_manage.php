<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/3
 * Time: 23:49
 */
require_once dirname(__FILE__) . '/../../sql/order_manage_sql.php';

class order_manage
{
    private $order_manage_sql;

    public function __construct()
    {
        $this->order_manage_sql = new order_manage_sql();
    }

    private function next_order_id()
    {
        $table = 'order_manage';
        $result = $this->order_manage_sql->select($table, array('max(order_id)'), array());
        if ($result) {
            print_r($result);
            $order_num = isset($result[0]['max(order_id)']) ? ++$result[0]['max(order_id)'] : 1;
            return $order_num;
        } else {
            return false;
        }
    }

    private function next_payment_id()
    {
        $table = 'payment';
        $result = $this->order_manage_sql->select($table, array('max(payment_id)'), array());
        if ($result) {
            print_r($result);
            $order_num = isset($result[0]['max(payment_id)']) ? ++$result[0]['max(payment_id)'] : 1;
            return $order_num;
        } else {
            return false;
        }
    }

    public function create_order($type, $state = 4)
    {
        $table = 'order_manage';
        $user_id = UserInfo::getUserId();
        $next_order_id = $this->next_order_id();
        $insert_sql = array('order_id' => $next_order_id, 'user_id' => (int)$user_id, 'type' => $type, 'state' => (int)$state);
        if ($this->order_manage_sql->insert($table, $insert_sql)) {
            return $next_order_id;
        } else {
            return 0;
        }
    }

    public function create_payment($type, $address, $cost, $cost_time, $area = 0)
    {
        $next_payment_id = $this->next_payment_id();
        $order = $this->create_order($type);
        $insert_sql = array('payment_id' => (int)$next_payment_id, 'order_id' => (int)$order,
            'address' => $address, 'cost' => (int)$cost, 'cost_time' => $cost_time, 'area' => (int)$area);
        $table='payment';
        if ($this->order_manage_sql->insert($table,$insert_sql)) {
            return true;
        }else{
            return false;
        }
    }

}