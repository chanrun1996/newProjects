<?php
/**
 * Created by PhpStorm.
 * User: chanrun
 * Date: 2020/5/5
 * Time: 15:42
 */
namespace app\api\controller\v1;
use think\Controller;
use think\Request;
Class Admin extends Controller{
   public function index(){
       return view('admin/index');
   }
}