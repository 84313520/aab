<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\AppServ\www\seckill_ours\public/../application/index\view\link\staffmgmt.html";i:1514102241;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>会员列表</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="__STATIC__/css/adminStyle.css" rel="stylesheet" type="text/css">
    <link href="__STATIC__/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="__STATIC__/js/jquery.js"></script>
</head>
<body>
<div class="wrap">
    <div class="page-title">
        <span class="modular fl"><i class="user"></i><em>员工列表</em></span>
        <span class="modular fr"><a href="<?php echo url('index/Link/addstaff'); ?>" class="pt-link-btn">+添加新员工</a></span>
    </div>
    <div class="operate">
        <form>
            <select class="inline-select" id="lock">
                <option value="全部">全部</option>
                <option value="clock">锁定</option>
                <option value="normal">使用</option>
            </select>
            <input type="text" id="input" class="textBox length-long" placeholder="输入员工编号、姓名、手机号码"/>
            <input type="button" onclick="changed()" value="查询" class="tdBtn"/>
        </form>
    </div>
    <table class="list-style Interlaced">
        <th class="center"><input type="checkbox"></th>
        <th class="center">账号</th>
        <th class="center">用户名称</th>
        <th class="center">用户职位</th>
        <th class="center">用户状态</th>
        <th class="center">入职日期</th>
        <th class="center">操作</th>
        <?php if(is_array($staffList) || $staffList instanceof \think\Collection || $staffList instanceof \think\Paginator): $i = 0; $__LIST__ = $staffList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$staff): $mod = ($i % 2 );++$i;?>
        <tr>
            <td class="center">
                <input type="checkbox">
            </td>
            <td class="center">
                <?php echo $staff['sid']; ?>
            </td>
            <td class="center">
                <?php echo $staff['sname']; ?>
            </td>
            <td class="center">
                <?php echo $staff['pname']; ?>
            </td>
            <td class="center">
                <?php echo $staff['state']; ?>
            </td>
            <td class="center">
                time
            </td>
            <td class="center">
                <?php switch($staff['state']): case "normal": ?>
                <input  type="button" value="锁定" onclick="clock('<?php echo $staff['sid']; ?>')" class="tdBtn"/>
                <?php break; case "clock": ?>
                <input type="button" value="使用" onclick="use('<?php echo $staff['sid']; ?>')" class="tdBtn"/>
                <?php break; default: ?>默认情况
                <?php endswitch; ?>
                <input type="button" value="修改" onclick="toUpdate('<?php echo $staff['sid']; ?>')" class="tdBtn"/>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <!-- BatchOperation -->
    <div style="overflow:hidden;">
        <!-- Operation -->
        <div class="BatchOperation fl">
            <input type="button" value="批量删除" class="btnStyle"/>
        </div>
        <!-- turn page -->
        <div class="turnPage center fr">
            <?php echo $staffList->render(); ?>
        </div>
    </div>
</div>
</body>
<script>
    var changedUrl="<?php echo url('/index/link/staffmgmt'); ?>";
    var clockUrl="<?php echo url('/index/Staff/clockStaff'); ?>";
    var useUrl="<?php echo url('/index/Staff/useStaff'); ?>";
</script>
<script type="text/javascript" src="__STATIC__/js/staffmgmt.js"></script>
</html>