<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/24
 * Time: 10:08
 */
namespace app\index\controller;
use \think\Controller;
use \think\Db;
use \think\Cache;
use \think\Request;//获取当前的请求信息
use think\Loader;//使用tp框架的缓存类
Loader::import('MyCtrl',EXTEND_PATH,'.php');
class User extends MyCtrl
{
    //使用用户
    public function openUser(){
        $u_id = input('param.u_id');
        $res = Db::name('user')->where('id',$u_id)->setField('state', '0');
        if($res!=0){
            return $this->newRes('302');
        }else{
            return $this->newRes('303');
        }
    }
    //锁定用户
    public function closeUser(){
        $u_id = input('param.u_id');
        $res = Db::name('user')->where('id',$u_id)->setField('state', '1');
        if($res!=0){
            return $this->newRes('300');
        }else{
            return $this->newRes('301');
        }
    }
    //重置密码
    public function resetPwd(){
        if(input('?post.u_id')){
            $u_id = input('param.u_id');
            $pwd = "123321";
            $newpwd = password_hash($pwd, PASSWORD_DEFAULT);
            $result = Db::name('user')->where('id', $u_id)->update(['upsw' => $newpwd]);
            if($result !=0){
                return $this->newRes('400');
            }else{
                return $this->newRes('401');
            }
        }
    }
}