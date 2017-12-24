<?php
/**
 * Created by PhpStorm.
 * User: 84313
 * Date: 2017/12/22
 * Time: 14:35
 */

namespace app\index\controller;
use think\Db;

use think\Loader;
Loader::import('MyCtrl', EXTEND_PATH,'.php');
class Link extends MyCtrl
{
    public function login()
    {
        return $this->fetch();
    }
    //后台管理主界面(即登录进来的界面)
    public function main(){
        return $this->fetch();
    }


    //商品显示
    public function goodshow(){
        //检测变量是否存在和xss,注入
        $ctname=isset($_GET['ctname'])?(int)$_GET['ctname']:"";
        $csname=isset($_GET['csname'])?(int)$_GET['csname']:"";
        $cstname=isset($_GET['cstname'])?(int)$_GET['cstname']:"";
        $content=isset($_GET['content'])?$_GET['content']:"";
        if($ctname==0&&$csname==0&&$cstname==0){
            $defaultres=Db::name("commodity")->alias('a')
                ->join('ctype b','a.ctid=b.ctid')
                ->join('cstate c','a.cstid=c.cstid')
                ->where('cname|introduction','like','%'.$content.'%')
                ->order('cid asc')
                ->paginate(3,false,['query'=>request()->param()]);
        }
        else if(($ctname&&$csname&&$cstname)!=0){
//            echo 1;exit;
            $where=[
                'a.ctid'=>$ctname,
                'a.csid'=>$csname,
                'a.cstid'=>$cstname
            ];
            $defaultres=Db::name("commodity")->alias('a')
                ->join('ctype b','a.ctid=b.ctid')
                ->join('t_csort c','a.csid=c.csid')
                ->join('cstate d','a.cstid=d.cstid')
                ->where($where)
                ->order('cid asc')
                ->where('cname|introduction','like','%'.$content.'%')
                ->paginate(3,false,['query'=>request()->param()]);
        }
        else{
            $where=[];
            //php中的添加数组比如$where['a.ctid']=$ctname;+>>>>>$where['a.ctid'=>$ctname]
            if($ctname!=0){
                $where['a.ctid']=$ctname;
            }
            if($csname!=0){
                $where['a.csid']=$csname;
            }
            if($cstname!=0){
                $where['a.cstid']=$cstname;
            }
            $defaultres=Db::name("commodity")->alias('a')
//                ->fetchSql()
                ->join('ctype b','a.ctid=b.ctid')
                ->join('t_csort c','a.csid=c.csid')
                ->join('cstate d','a.cstid=d.cstid')
                ->where($where)
                ->where('cname|introduction','like','%'.$content.'%')
                ->order('cid asc')
                ->paginate(3,false,['query'=>request()->param()]);
//            var_dump($defaultres) ;exit;
        }
        $this->assign('defaultres',$defaultres);
        return $this->fetch();
    }


    //后台用户管理-显示用户列表
    public function usermgmt(){
        $keyWord = input('param.keyWord');//搜索的内容
        if(input('?get.state') && input('param.state')!='2'){
            $state = input('param.state');//状态--使用/锁定
            $list= Db::name('user')
                ->where('uname','like','%'.$keyWord.'%')
                ->where('isDel',0)->where('state',$state)->paginate(4,false,['query'=>request()->param()]);
        }else{
            $list = Db::name('user')
                ->where('isDel',0)
                ->where('uname','like','%'.$keyWord.'%')->paginate(4);
        }
        $this->assign('list', $list);
        return $this->fetch();
    }

    //后台员管理-员工列表
    public function staffmgmt(){
        if(input('?get.input')){
            $input=input('get.input');//输入值
        }else{
            $input='';
        }
        if(input('?get.select') && input('get.select')!='全部'){//锁定
            $select=input('get.select');//使用、锁定
            //$staffList=Cache::get('good_'.$select);//缓存搜索值
            //if(!$staffList){
            $staffList = Db::name("staff_position")->alias('a')
                ->join('staff w','a.sid = w.sid')
                ->join('position c','a.pid = c.pid')
                ->where('state',$select)
                ->where('sname','like','%'.$input.'%')
                ->paginate(3,false,['query'=>request()->param()]);
            //Cache::set('good_'.$select,$staffList,3600);
            //}
        }else{
            $staffList = Db::name("staff_position")->alias('a')
                ->join('staff w','a.sid = w.sid')
                ->join('position c','a.pid = c.pid')
                ->where('sname','like','%'.$input.'%')
                ->paginate(3);
        }
        $this->assign('staffList', $staffList);
        return $this->fetch();
    }
    //后台员工管理-添加/修改员工资料
    public function addstaff(){
        //参数：添加或修改
        $this->assign('action', '');
        return $this->fetch();
    }
    //后台订单管理-未支付订单
    public function unpaid(){
        return $this->fetch();
    }
    //后台订单管理-已支付订单
    public function paid(){
        return $this->fetch();
    }

}