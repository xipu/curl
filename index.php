<?php
include './vendor/autoload.php';

use \shui\Curl;

//发送get请求
$res = Curl::get('http://ip.taobao.com/service/getIpInfo.php?ip=114.114.114.114');
echo $res.'<br>';
//发送post请求
$res = Curl::post('http://ip.taobao.com/service/getIpInfo.php?ip=114.114.114.114', '');
echo $res.'<br>';
//发送post请求 json
$res = Curl::post('http://ip.taobao.com/service/getIpInfo.php?ip=114.114.114.114', json_encode([]), true);
echo $res;