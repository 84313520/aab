<?php
/**
 * Created by PhpStorm.
 * User: 84313
 * Date: 2017/12/24
 * Time: 16:04
 */

namespace app\index\controller;
//db数据库
use \think\Db;
//输出提示字
use \think\Response;
//使用session
use \think\Session;
use think\Loader;
Loader::import('MyCtrl', EXTEND_PATH,'.php');
class Commodity extends MyCtrl
{
    //上架    咱不能跳回当前页
    public function upurl(){
        $cid=isset($_GET['cid'])?$_GET['cid']:"";
        Db::name('commodity')->update(['cstid' => 1,'cid'=>$cid]);
        return $this->newRes('501');
    }
    //下架
    public function downurl(){
        $cid=isset($_GET['cid'])?$_GET['cid']:"";
        Db::name('commodity')->update(['cstid' => 2,'cid'=>$cid]);
        return $this->newRes('502');
    }

}