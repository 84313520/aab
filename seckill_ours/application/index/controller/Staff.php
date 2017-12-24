<?php
/**
 * Created by PhpStorm.
 * User: wjj
 * Date: 2017/12/22
 * Time: 14:58
 */
namespace app\index\controller;
use \think\Controller;
use \think\Db;   //---不需要model文件，直接调用
use \think\Cache;
use think\Loader;//使用tp框架的缓存类
Loader::import('MyCtrl',EXTEND_PATH,'.php');
class Staff extends MyCtrl
{
    //锁定员工
    public function clockStaff(){
        if(input('?get.sid')){
            $sid=input('get.sid');
            $res=Db::name('staff')->where('sid', $sid)->update(['state' => 'clock']);
            if($res==1){
                return $this->newRes('300');
            }else{
                return $this->newRes('301');
            }
        }
    }
    //使用员工
    public function useStaff(){
        if(input('?get.sid')){
            $sid=input('get.sid');
            $res=Db::name('staff')->where('sid', $sid)->update(['state' => 'normal']);
            if($res==1){
                return $this->newRes('302');
            }else{
                return $this->newRes('303');
            }
        }
    }
    //
}