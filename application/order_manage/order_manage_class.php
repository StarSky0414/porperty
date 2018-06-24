<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/3
 * Time: 23:49
 */
require_once dirname(__FILE__) . '/../../sql/order_manage_sql.php';

class order_manage_class
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

    public function create_payment($type, $address, $cost, $cost_time,$money, $area = 0)
    {
        $userId = UserInfo::getUserId();
        $next_payment_id = $this->next_payment_id();
        $order = $this->create_order($type);
        $insert_sql = array('payment_id' => (int)$next_payment_id, 'order_id' => (int)$order,'user_id'=>(int)$userId,
            'address' => $address, 'cost' => (int)$cost, 'cost_time' => $cost_time, 'area' => (int)$area,'money'=>(int)$money);
        $table='payment';
        if ($this->order_manage_sql->insert($table,$insert_sql)) {
            return true;
        }else{
            return false;
        }
    }

    public function payment_show($start){
        $userId = UserInfo::getUserId();
//        $select_sql = array('order_id', 'c_time','type');
//        $where_sql = array('user_id' => (int)$userId,'state' =>4);
//        $indent_list = $this->order_manage_sql->select_limit('order_manage', $select_sql, $where_sql,$start);
        $sql='select payment.order_id,c_time,type,money from order_manage,payment WHERE payment.order_id=order_manage.order_id and payment.user_id=? AND state=4 ORDER BY order_id DESC LIMIT '.$start.',10';
        $PDOStatement = $this->order_manage_sql->dbHandle->prepare($sql);
        $PDOStatement->execute(array($userId));
        $indent_list = $PDOStatement->fetchAll();
//        foreach ($indent_list as $key=>$value){
//            $indent_list[$key]['money']=$this->order_manage_sql->select('payment',array('money'),array($value['order_id']))[0]['money'];
//        }
        $list['list']=$indent_list;
//        print_r(json_encode($list,JSON_UNESCAPED_UNICODE));
        return $list;
    }

    public function payment_info($order_id){
        $select_sql_pay_info = array('area', 'cost_time','address','money');
        $where_sql = array('order_id' => (int)$order_id);
        $indent_result = $this->order_manage_sql->select('payment', $select_sql_pay_info, $where_sql);
        $select_sql_order = array('c_time', 'state','type');
        $order_result = $this->order_manage_sql->select('order_manage',$select_sql_order,$where_sql);
        print_r($indent_result);
        print_r($order_result);
        $indent_info['payment']=$indent_result[0];
        print_r($indent_info['payment']);
        $array_merge_recursive = array_merge_recursive($indent_info['payment'], $order_result[0]);
//        $indent_info['payment']['order']=$order_result;
//        return $indent_info;
        print_r($array_merge_recursive);
        return $array_merge_recursive;
    }

    public function user_home_property_free($pro_id, $home_id){
        $select_sql=array('area','property_free');
        $where_sql=array('pro_id'=>$pro_id,'home_id'=>$home_id);
        $area = $this->order_manage_sql->select('homeinfo', $select_sql, $where_sql)[0];
        return $area;
    }

    public function user_home_car_free($pro_id, $home_id){
        $select_sql=array('car_free');
        $where_sql=array('pro_id'=>$pro_id,'home_id'=>$home_id);
        $car_free = $this->order_manage_sql->select('homeinfo', $select_sql, $where_sql)[0]['car_free'];
        return $car_free;
    }

    public function user_now_pro_home($id){
        $select_sql=array('current_hose_id','current_property_id');
        $where_sql=array('id'=>$id);
        $select = $this->order_manage_sql->select('user', $select_sql, $where_sql)[0];
        return $select;
    }
}