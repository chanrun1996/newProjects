<?php
/**
 * Created by PhpStorm.
 * User: chanrun
 * Date: 2020/5/7
 * Time: 16:54
 */
namespace app\api\logic;
use think\Request;
Class Base{
    public function del($id=""){
       $model  = $this->model::get($id);
       $sql = $model->delete();
       if($sql){
          return return_Ajax(200,'删除成功');
       }else{
          return return_Ajax(400,'删除失败');
       }
    }
}
