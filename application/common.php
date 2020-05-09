<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Facade\Env;

/**
 * 树形结构
 * @return array
 */
function tree(&$list,$pid=0,$level=0,$html='|--|--'){

    static $tree = array();

    foreach($list as $v){

        if($v['pid'] == $pid){
            $v['html'] = str_repeat($html,$level); //层级 --  ----  ------
            $v['level']=$level;
            $tree[] = $v;
            tree($list,$v['id'],$level+1);
        }
    }

    return $tree;
}

/*排序*/
function arrOrder($data,$key,$sort = SORT_ASC){
    if(!is_array($data) || !$key){
        return [];
    }
    array_multisort(array_column($data,$key),$sort,$data);
    return $data;
}

/*返回layui table数据*/
function return_tableRes($code,$msg,$data=[],$count){
    $arr = [
        'code' => $code,
        'msg'  => $msg,
        'data' => $data,
        'count'=> $count,
    ];
    return json($arr);
}



/*返回aja*/
function return_Ajax($code,$msg,$data=''){
    $arr = [
        'code' => $code,
        'msg'  => $msg,
        'data' => $data,
    ];
    return $arr;
}
