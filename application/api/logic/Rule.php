<?php
/**
 * Created by PhpStorm.
 * User: chanrun
 * Date: 2020/5/6
 * Time: 14:38
 */
namespace app\api\logic;
use app\api\model\Rule as RuleModel;
Class Rule extends Base {

    protected $model;

    public function __construct()
    {
        $this->model = new RuleModel();
        $this->list  = $this->model->select()->toArray();

    }
    public function index(){
/*        $list = arrOrder(tree($this->list),'level');*/
        return return_tableRes(0,"",tree($this->list),count($this->list));
    }

    public function getInfo($id){
        $info  = $this->model->find($id);
        if(empty($info)){
            return ['list'=>tree($this->list)];
        }else{
            return array('info'=>$info->toArray(),'list'=>tree($this->list));
        }
    }
    public  function add($data,$id=""){
       $num =  $this->model->where('rule_name',$data['rule_name'])->where('id','neq',$id)->count();
       if($num == 0){
           if(empty($id)){
               $sql  =  $this->model->allowField(true)->save($data);
           }else{
               $sql  =  $this->model->allowField(true)->save($data,['id'=>$id]);
           }
           if($sql){
               return return_Ajax(400,"权限添加/修改成功");
           }else{
               return return_Ajax(200,"权限添加/修改失败");
           }
       }else{
           return return_Ajax(400,"此权限已存在数据库中请勿重复添加");
       }
    }
    public function del($id=""){

      if(is_array($id)){
          $parent_id = $this->model->where('id','in',$id)->column('id');
      }else{
          $parent_id = $this->model->where('id',$id)->column('id');
      }

      $res =  $this->get_childs($parent_id);
      $ids = array_merge($res,$parent_id);
      $sql =$this->model->where('id','in',$id)->delete();
      if($sql){return return_Ajax(200,"删除成功");}else{return return_Ajax(400,"删除失败");}
    }

    /**   获取父级下所有的子级id
     * @param array $parent_id
     * @return array
     */
    public function get_childs( $parent_id = array()){
        /*定义数组*/
        static  $id_arr = array();
        $id_arr= $this->model->whereOr('pid','in',$parent_id)->column('id');
        if (!empty($id_arr)) {
            $id_arr=array_merge($id_arr,$this->get_childs($id_arr));
        }
        return $id_arr;
    }

    /**   获取父级下所有的id
     * @param $pid
     * @param array $array
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public  function getParent( $pid ,$array=[]) {
        static $level = 1;
        $is_parent = $this->model->where(["id"=>$pid])->find();
        $array[] = $is_parent;
        if ( $is_parent["reid"] ) {
            $level++;
            return $this->getParent( $is_parent['reid'],$array);
        }
        return $array;

    }


}