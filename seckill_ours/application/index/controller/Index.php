<?php
namespace app\index\controller;

use think\Controller;

use think\Loader;
Loader::import('MyCtrl', EXTEND_PATH,'.php');
//db数据库
use \think\Db;
//输出提示字
use \think\Response;
//使用session
use \think\Session;
class Index extends MyCtrl
{
    //处理登入的dologin请求
    public function dologin(){
        //检测变量是否存在和xss,注入
        if(input('?post.admin')&&input('?post.admin_pwd')&&input('?post.auth_code')){
            $admin=input('param.admin');
            $admin_pwd=input('param.admin_pwd');
            $auth_code=input('param.auth_code');
            //检验验证码
            $checkCode=captcha_check($auth_code);
            if($checkCode){
                $where=[
                    's.sid'=>$admin,
                ];
                $result=Db::name('staff')->alias('s')
                    ->join('staff_position sp','s.sid = sp.sid')
                    ->join('position p','sp.pid = p.pid')
                    ->where($where)->find();
                if(empty($result)){
                    return $this->newRes('201');
                }
                else{
//                    $hash = password_hash($admin_pwd, PASSWORD_DEFAULT);
                    if (password_verify($admin_pwd,$result['psw'])) {
                        Session::set('admininfo',$result);
                        return $this->newRes('200',['url'=>url('index/link/main')]);
                    } else {
                        return $this->newRes('202');
                    }
                }
            }
            else{
                return $this->newRes('204');
            }
        }
    }


}
