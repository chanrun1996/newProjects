<?php
/**
 * Created by PhpStorm.
 * User: chanrun
 * Date: 2020/5/5
 * Time: 17:01
 */
namespace app\api\controller\v1;
use think\Controller;
use think\Request;
Class Index extends Controller{
    public function index()
    {
        return view('index/index');
    }
}