<?php
/*
 * 在您使用STS SDK前，请仔细阅读RAM使用指南中的角色管理部分，并阅读STS API文档
 *
 */


include_once 'aliyun-php-sdk-core/Config.php';
use Sts\Request\V20150401 as Sts;

// 你需要操作的资源所在的region，STS服务目前只有杭州节点可以签发Token，签发出的Token在所有Region都可用
// 只允许子用户使用角色
$iClientProfile = DefaultProfile::getProfile("cn-shenzhen", "LTAIKM4LUXwvGYpm", "SgxBmB06m7UWf2zpyFHuDjyz7eXJST");
$client = new DefaultAcsClient($iClientProfile);

// 角色资源描述符，在RAM的控制台的资源详情页上可以获取
$roleArn = "acs:ram::1321290185118957:role/aliyunosstokengeneratorrole";


// 在扮演角色(AssumeRole)时，可以附加一个授权策略，进一步限制角色的权限；
// 详情请参考《RAM使用指南》
// 此授权策略表示读取所有OSS的只读权限
$policy=<<<POLICY
{
  "Version": "1",
  "Statement": [
    {
      "Action": "oss:*",
      "Resource": "*",
      "Effect": "Allow"
    }
  ]
}
POLICY;

$request = new Sts\AssumeRoleRequest();
// RoleSessionName即临时身份的会话名称，用于区分不同的临时身份
// 您可以使用您的客户的ID作为会话名称
$request->setRoleSessionName("bbb");
$request->setRoleArn($roleArn);
//$request->setPolicy($policy);
$request->setDurationSeconds(3600);
$response = $client->doAction($request);
if ($response->getStatus()!=200){
    return 0;
}
if ($response->getStatus()==200){
//    print_r(json_encode(json_decode($response->getBody(),true)['Credentials']));
    print_r($response->getBody());
}else{
    echo 0;
    return;
}

//echo json_encode($response->getBody(),JSON_UNESCAPED_UNICODE);
?>
