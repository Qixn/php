<?php 
include('data-url.php');
//将 url每行一个放入变量$url_data的数组中，引入
$t=$_GET['t'];
//t作为以2000步长的组
$data_size=floor(count($url_data)/2000);

if ($t>$data_size){echo 'is done!';die;}
else{
	$url_data=array_slice($url_data,$t*2000,2000);
	$urls = $url_data;
//
header('Refresh: 10; url=http://localhost:802/tijiao.php?t='.($_GET['t']+1)); 
//用头自动跳+1 模式循环提交 10秒一次
$api = 'http://data.zz.baidu.com/urls?site=域名&token=码';
//token 码从百度站长后台获得。

//已下部分 提交，来自百度官方的php提交代码
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo $result;
}
?>
