<?php 
//[第一种数组形式]key_date.php code $key_data=array('',''); 把词放进数组里。
include('key_date.php');


//[第二种，直接读文件，放入数组]
//用localhost/search_key_build_url.php?t=1 .....X 来读取 key-1.txt ....key-x.txt
//.txt文件 中的关键词 一行一个。

$t=$_GET['t'];
if ($t == ''){
	$t= 0;
	}
$k_d='key-'.$t.'.txt';
//echo $k_d;die;
$file = fopen($k_d, "r");
$user=array();
$i=0;

//输出文本中所有的行，直到文件结束为止。
while(! feof($file))
{
    $user[$i]= fgets($file);//fgets()函数从文件指针中读取一行
    $i++;
}
fclose($file);
$user=array_filter($user);
//print_r($user);
//输出所有的url
foreach($user as $bb){ 
		//$bb = utf8_encode($key_data);
echo 	"https://m.baidu.com/s?wd=".urlencode($bb)."\n";
}
//这个文件的主要目的是，吧我们要查的词
//生成连接 便于用sehll 脚本，或者火车头等采集工具，直接采集
//推荐直接读取txt 比较省事 ^_^
?>
