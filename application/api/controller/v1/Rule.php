<?php
/**
 * Created by PhpStorm.
 * User: chanrun
 * Date: 2020/5/5
 * Time: 15:42
 */
namespace app\api\controller\v1;
use think\App;
use think\Controller;
use think\Request;
use think\facade\Cache;
use app\api\logic\Rule as RuleLogic;
Class Rule extends Base{
    protected $request;
    protected $logic;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->logic = new RuleLogic();

    }

    public function index(){
        if($this->request->isAjax()){
           $list =  (new RuleLogic())->index();
           return $list;
        }
        return view('rule/index');
    }

    public function add($id=""){
        if($this->request->isGet()){
            $res  = (new RuleLogic())->getInfo($id);
            if(empty($id)){
                return view('rule/add',['data'=>$res,'id'=>$id]);
            }else{
                return view('rule/edit',['data'=>$res,'id'=>$id]);
            }
        }else{
            $post = $this->request->param()['data'];
            $res = (new RuleLogic())->add($post,$id);
            return json_encode($res);
        }
    }


}