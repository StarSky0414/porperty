<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/15
 * Time: 9:52
 */
require_once dirname(__FILE__) . '/../../sql/maintain_sql.php';
require_once dirname(__FILE__) . '/../order_manage/order_manage_class.php';

class maintain_class
{

    private static $TABLE = 'staff';
    private static $FIELD_ID = 'id';
    private static $FIELD_PROJECT_ID = 'project_id';
    private static $FIELD_NAME = 'name';
    private static $FIELD_INTRODUCTION = 'introduction';
    private static $FIELD_PHOTO = 'photo';
    private static $FIELD_PHONE = 'phone';
    private static $FIELD_TIME = 'time';
    private static $FIELD_GRADE = 'grade';
    private $maintain_sql;

    public function __construct()
    {
        $this->maintain_sql = new maintain_sql();
    }

    public function show_project_staff($project_id)
    {
        $select_sql = array(self::$FIELD_ID, self::$FIELD_NAME, self::$FIELD_PHONE, self::$FIELD_PHOTO, self::$FIELD_TIME, self::$FIELD_GRADE);
        $where_sql = array(self::$FIELD_PROJECT_ID => (int)$project_id);
        if ($result = $this->maintain_sql->select(self::$TABLE, $select_sql, $where_sql)) {
            return $result;
        }
        return false;
    }

    public function user_property($user_id){
        $user_property_select = $this->maintain_sql->user_property_select($user_id);
        return $user_property_select;
    }

    public function indent_submit($user_address,$staff_id, $staff_name, $photo_url, $remark, $part)
    {
        $where_arr = array();
        $select_max_num = $this->maintain_sql->select_max_num('indent', 'indent_id', $where_arr);
        $indent_id = $select_max_num['max(indent_id)'] + 1;
        return $this->maintain_sql->indent_submit_insert($indent_id,$staff_id,$staff_name,$photo_url,$remark,$part,$user_address);
    }

    public function indent_show_list($userId)
    {
        $indent_show_list_select = $this->maintain_sql->indent_show_list_select($userId);
        return $indent_show_list_select;
    }

    public function indent_show($order_id)
    {
        $select_sql_indent = array('staff_id', 'staff_name','address','part');
        $where_sql = array('order_id' => $order_id);
        $indent_result = $this->maintain_sql->select('indent', $select_sql_indent, $where_sql);
        $select_sql_order = array('c_time', 'state');
        $order_result = $this->maintain_sql->select('order_manage',$select_sql_order,$where_sql);
//        print_r($indent_result);
//        print_r($order_result);
        $indent_info['indent']=$indent_result[0];
//        print_r($indent_info['indent']);
        $indent_info['indent']['order']=$order_result;
        return $indent_info;
    }

}