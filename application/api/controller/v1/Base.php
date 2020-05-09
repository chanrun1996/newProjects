<?php
/**
 * Created by PhpStorm.
 * User: chanrun
 * Date: 2020/5/7
 * Time: 16:04
 */
namespace app\api\controller\v1;
use think\Controller;
use think\Db;
use think\Request;
Class Base extends Controller{

    public function del(Request $request,$id=""){
        empty($id)?$id=explode(',',rtrim($request->param()['ids'],',')):$id;
        return $this->logic->del($id);
    }
}