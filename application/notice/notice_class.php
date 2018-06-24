<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/3/20
 * Time: 17:55
 */

class notice_class
{
    private $notice_sql;

    public function __construct()
    {
        $this->notice_sql = new notice_sql();
    }


    public function notic_list($user_id, $start)
    {
        $property = $this->getcurpro($user_id);
        $property_notic_list = $this->notice_sql->property_notic_list($property, $start);
        return $property_notic_list;
    }

    private function getcurpro($user_id)
    {
        $getcurpro_sql = $this->notice_sql->getcurpro_sql($user_id);
        return $getcurpro_sql;
    }

    public function notic_list_within($userId, $start)
    {
        $property = $this->getcurpro($userId);
        $property_notic_list = $this->notice_sql->property_notic_within_list($property, $start);

        return $property_notic_list;
    }

    public function notic_list_except($userId, $start)
    {
        $property = $this->getcurpro($userId);
        $property_notic_list = $this->notice_sql->property_notic_except_list($property, $start);
        return $property_notic_list;
    }

    public function notic_info($notice_id)
    {
        $notice_info_sele = $this->notice_sql->notice_info_sele($notice_id);

        $url_list = $notice_info_sele['url_list'];
        $explode = explode('##', $url_list);
        $notice_info_sele['url_list'] = $explode;
        return $notice_info_sele;
    }

    public function find_notic($notic_part,$pro_id)
    {
        $notic_select = $this->notice_sql->find_notic_select($notic_part, $pro_id);
        return $notic_select;
    }


}