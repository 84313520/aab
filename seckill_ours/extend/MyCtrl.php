<?php
/**
 * Created by PhpStorm.
 * User: 84313
 * Date: 2017/12/17
 * Time: 23:31
 */

namespace app\index\controller;



use think\Controller;
use think\Session;
use think\Request;


class MyCtrl extends Controller
{
    /*
     * 返回消息数组，传入消息代码（可在配置文件中查看）,数据参数可选
     * */
    public function newRes($code,$data=[]){
        $res = [
            'code'=>$code,
            'msg'=>config('myRes')[$code],
            'data'=>$data
        ];
        return $res;
    }

    /*
     * 前置方法  判断是否登录
     * */
    public function _initialize()
    {
//        return;
        if(empty(Session::get('nowLogin'))){
            $request = Request::instance();
            $c = $request->controller();
            $a = $request->action();

            if($c!= 'Link' || ($a != 'login' )){

                if($c!= 'Index' || ( $a != 'dologin' && $a != 'islogin')){
                    if(empty(Session::get('admininfo'))){
                       $this->error('非法操作!','Link/login');
                        die(0);
                    }
                }
            }
        }

    }

}