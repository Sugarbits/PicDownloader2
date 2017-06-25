<?php
//ref: https://stackoverflow.com/questions/724391/saving-image-from-php-url
$url = "".$_GET['url']."";
//$dir = $_GET['dir'];
$filename = $_GET['filename'];

//print_r($_GET);
//echo $url;
/*
*功能：php完美实现下载远程图片保存到本地
*参数：文件url,保存文件目录,保存文件名称，使用的下载方式
*当保存文件名称为空时则使用远程文件原来的名称
*/
function getImage($url,$save_dir='/var/www/html/datacollection',$filename=''){
	$ch = curl_init($url);
	$fp = fopen($save_dir.$filename, 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);
	
}

//getImage($url,$dir,$filename);
print_r(getImage($url,$dir,$filename));
?>