<?php
namespace app\index\controller;
use think\Request;
use Firebase\JWT\JWT;
use think\Controller;
use think\Facade\Config;
class Index
{
/*$token = Request::header('token');
headers:{ token:'HTTP HEADER AJAX TOKEN TEST'}*/
    public function index($admin_id="MuFanKeJi666")
    {
        $secret = Config::get('token.key');
        $payload = [
            'iss'=>Config::get('token.iss'),                //签发人(官方字段:非必需)
            'exp'=>time()+3600*24*7,     //过期时间(官方字段:非必需)
            'aud'=>'admin',              //受众(官方字段:非必需)
            'nbf'=>time(),               //生效时间(官方字段:非必需)
            'iat'=>time(),               //签发时间(官方字段:非必需)
            'admin_id'=>$admin_id,        //自定义字段
            'admin'=>true                //自定义字段
        ];

        $token = JWT::encode($payload,$secret,'HS256');
        $tokenEncode = $this->hello($token);
        dump($tokenEncode);
        return $token;
    }

    public function hello($token,$name = 'ThinkPHP5')
    {
        try{
            $Result = JWT::decode($token,Config::get('token.key'),['HS256']);

            return $Result;
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }

    }
}
