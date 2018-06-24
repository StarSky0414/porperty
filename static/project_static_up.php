<?php
/**
 * 用于静态项目
 * https://thethreestooges.cn/property/static/project_static_up.php
 */
//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
require dirname(__FILE__).'/../sql/static_sql.php';

$mysql= new static_sql();
$big=$mysql->big_project();//列出大项目都有什么
$arr['proinfo'][]=array();   //用于json格式化使用
$i=0;
foreach ($big as $big_v) {
    $small=$mysql->small_project($big_v['big_id']);//列出大项目中的小项都有什么
    $arr['proinfo'][$i]['kind']=$big_v['project'];
    $t=0;
    foreach ($small as $small_v) {

//        $arr['project'][$big_v['project']][]=$small_v['project'];
        $arr['proinfo'][$i]['detailed'][$t]['id']=$small_v['small_id'];
        $arr['proinfo'][$i]['detailed'][$t]['name']=$small_v['project'];
        $arr['proinfo'][$i]['detailed'][$t]['url']=$small_v['photo_url'];
        $t++;
    }
    $i++;
}
echo json_encode($arr,JSON_UNESCAPED_UNICODE); //查看格式化结果
//$myfile = fopen("file/project_static.json", "w") or die("Unable to open file!");
//fwrite($myfile,json_encode($arr,JSON_UNESCAPED_UNICODE));//写入文件

//print_r($arr);
//print_r(json_encode($arr,JSON_UNESCAPED_UNICODE));
//echo 'json静态化完成。';
