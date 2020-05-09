<?php
/**
 * Created by PhpStorm.
 * User: chanrun
 * Date: 2020/5/5
 * Time: 12:12
 */
namespace app\api\controller\v1;
use think\App;
use think\Controller;
use think\Model;
use think\Request;
Class Login extends Controller {
    protected $request;
    protected $middleware = ['Login'];

    public function __construct(Request $request)
    {
       $this->request = $request;
    }

    public function login()
    {
        return view('login/login');
    }
    public function checkLogin()
    {
        $post = $this->request->param()['data'];

    }
}