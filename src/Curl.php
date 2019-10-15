<?php

namespace shui;

/**
 * Curl请求类
 * Class Curl
 * @package shui\Curl
 */
class Curl {

    /**
     * GET请求
     * 
     * @param string $url 地址
     * @return mixed 
     */
    public static function get($url) {
        //创建并初始化curl
        $ch = curl_init($url);
        //设置请求头信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        //发送并获取结果
        $res = curl_exec($ch);
        //释放资源
        curl_close($ch);
        return $res;
    }

    /**
     * POST请求
     * 
     * @param string $url
     * @param string $data
     * @param bool $json
     * @return mixed
     */
    public static function post($url, $data, $json = false) {
        //创建初始化curl
        $ch = curl_init($url);
        //设置请求头信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        if ( $json ) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length:' . strlen($data)
            ));
        }
        //发送并获取结果
        $res = curl_exec($ch); 
        curl_close($ch);
        return $res;
    }
}