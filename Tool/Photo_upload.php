<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/16
 * Time: 11:18
 */

require_once dirname(__FILE__) . '/../sql/Photo_tool_sql.php';
define('__PHOTO_URL__','https://thethreestooges.cn:1225/resource');
define('__PHOTO_PATH__','/var/www/work/merchant/resource');
class Photo_upload
{
    private function max_photo_name($typename, $mer_id)
    {
        $photo_tool_sql = new Photo_tool_sql();
        $max_photo_name = $photo_tool_sql->max_photo_name($mer_id, $typename);
//        print_r($max_photo_name);
        return $max_photo_name;
    }

    public function photo_load($typename, $mer_id){

        if (!isset($_FILES[$typename]['name'])) {
            echo '2';
            return false;
        }
        $string = $_FILES[$typename]['name'];
        $postfix  = explode('.',$string)[1];
        $max_photo_name = $this->max_photo_name($typename, $mer_id);
        $max_photo_name++;
        $mkdir_file_path=__PHOTO_PATH__.'/'.$mer_id.'/'.$typename;
        $photo_file_path=__PHOTO_PATH__.'/'.$mer_id.'/'.$typename.'/'.$max_photo_name.$postfix;
        $photo_url=__PHOTO_URL__.'/'.$mer_id.'/'.$typename.'/'.$max_photo_name.$postfix;
        if (!is_dir($mkdir_file_path)) {
            mkdir($mkdir_file_path,0777,true);
        }
        if (is_uploaded_file($_FILES[$typename]['tmp_name'])) {
            if (move_uploaded_file($_FILES[$typename]['tmp_name'], $photo_file_path)) {
                $photo_tool_sql = new Photo_tool_sql();
                $photo_tool_sql->insert_photo($mer_id,$max_photo_name,$typename,$photo_url);
               return $photo_url;
            }
        }
    }
}