<?php
/**
 * Created by PhpStorm.
 * User: chanrun
 * Date: 2020/5/5
 * Time: 14:40
 */
namespace app\api\validate;

use think\Validate;

class User extends Validate
{
    protected $rule =   [
        'uname'  => 'require|chsDash|max:25|min:8',
        'password'   => 'require|max:25|min:8',
    ];
    protected $message  =   [
        'uname.require' => '请注意：账号名称为必填选项~',
        'uname.chsDash' => '账号名称只能是汉字、字母、数字和下划线_及破折号-',
        'uname.max'     => '请注意：账号名称最多不能超过25个字符',
        'uname.min'     => '请注意：账号名称不得少于8个字符,请注意格式',

        'password.require' => '请注意：密码不能为空~',
        'password.max'     => '请注意：密码最多不能超过25个字符',
        'password.min'     => '请注意：密码不得少于8个字符,请注意格式',
        'password.alphaNum'=> '请注意：密码格式只能为字母和数字'
    ];
}