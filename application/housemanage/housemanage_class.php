<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/13
 * Time: 11:18
 */

class housemanage_class
{

    private $housemanage_sql;

    public function __construct()
    {
        $this->housemanage_sql = new housemanage_sql();
    }

    public function find_pro_list($userId)
    {
        $pro_list_select = $this->housemanage_sql->find_pro_list_select($userId);
        return $pro_list_select;
    }

    public function set_user_pro_id($userId, $pro_id)
    {
        $set_user_pro_id_update = $this->housemanage_sql->set_user_pro_id_update($userId, $pro_id);
        return $set_user_pro_id_update;
    }

    public function show_user_house($user_id,$user_current_property_id)
    {
        $show_user_house = $this->housemanage_sql->show_user_house($user_id,$user_current_property_id);
        return $show_user_house;
    }

    public function show_user_son($home_id)
    {
        $show_user_son = $this->housemanage_sql->show_user_son($home_id);
        return $show_user_son;
    }

    public function son_add($user_current_hose_id, $remark, $phone, $user_id,$son_name)
    {
        $user_name_to_id = $this->user_name_to_id($son_name);
        $user_exit_sele = $this->housemanage_sql->user_exit_sele($user_name_to_id,$user_current_hose_id);
        if ($user_exit_sele==0){
//            print_r('!!!!');
            $son_add_insert = $this->housemanage_sql->son_add_insert($user_current_hose_id, $remark, $phone, $user_id, $user_name_to_id);
            return $son_add_insert;
        }else{
            return 0;
        }
    }

    private function user_name_to_id($son_name)
    {
        $user_name_to_id_select = $this->housemanage_sql->user_name_to_id_select($son_name);
        return $user_name_to_id_select;
    }

    public function delete_user_son($user_id, $son_id, $user_current_hose_id)
    {
        $delete_user_son_dele = $this->housemanage_sql->delete_user_son_dele($user_id, $son_id, $user_current_hose_id);
        return $delete_user_son_dele;
    }

    public function son_update($son_id, $remark, $phone,$user_current_hose_id)
    {
        $son_update_sql = $this->housemanage_sql->son_update_sql($son_id, $remark, $phone, $user_current_hose_id);
        return $son_update_sql;
    }

    public function set_user_home_id($userId, $home_id)
    {
        $set_user_home_id_update = $this->housemanage_sql->set_user_home_id_update($userId, $home_id);
        return $set_user_home_id_update;
    }

    public function hous_all_show($user)
    {
        $hous_all_show_sele = $this->housemanage_sql->hous_all_show_sele($user);
        foreach ($hous_all_show_sele as $key=>$item){
            $home_id = $item['home_id'];
            $house_name = $this->housemanage_sql->house_name($home_id);
            $pro_name = $this->housemanage_sql->pro_name($house_name['pro_id']);
//            print_r($pro_name);
//            print_r($pro_name.$house_name['address']);
            $hous_all_show_sele[$key]['house_name']=$pro_name.$house_name['address'];
//            $hous_all_show_sele[$key]['pro_name']=$pro_name;
        }
        return $hous_all_show_sele;
    }
}