<?php
/**
 * Created by PhpStorm.
 * User: 84313
 * Date: 2017/12/23
 * Time: 16:04
 */

namespace app\index\controller;


use think\Session;
use think\Loader;
Loader::import('MyCtrl', EXTEND_PATH,'.php');
class Login extends MyCtrl
{
    public function logout(){
        Session::delete('admininfo');
        $this->success('成功注销','index/Link/login');
    }
}