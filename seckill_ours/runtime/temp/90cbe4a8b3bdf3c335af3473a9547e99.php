<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\AppServ\www\seckill_ours\public/../application/index\view\link\usermgmt.html";i:1514101725;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>用户管理</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="__STATIC__/css/adminStyle.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="__STATIC__/js/jquery.js"></script>
    <script src="__STATIC__/js/public.js"></script>
    <!--<script src="__STATIC__/js/bootstrap.js"></script>-->
    <!--<script src="__STATIC__/js/angular.js"></script>-->
</head>
<style>
    .tb_site,.tb_site>th{
        text-align: center;
    }
</style>
<body>
<div class="wrap">
    <div class="page-title">
        <span class="modular fl"><i></i><em>用户列表</em></span>
    </div>
    <div class="operate">
        <form>
            <select class="inline-select" id="sort">
                <option value="2">全部</option>
                <option value="0">使用</option>
                <option value="1">锁定</option>
            </select>
            <input type="text" id="keyWord" class="textBox length-long" placeholder="输入用户名..."/>
            <input type="button" value="查询" class="tdBtn" onclick="search()"/>
        </form>
    </div>
    <table class="list-style Interlaced tb_site">
        <tr class="tb_site" >
            <th>用户名</th>
            <th>昵称</th>
            <th>头像</th>
            <th>余额</th>
            <th>电话</th>
            <th>qq</th>
            <th>等级</th>
            <th>状态</th>
            <th>注册时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
        <tr>
            <td id="allBox"><input type="checkbox" class="childChecked">
                <?php echo $user['uid']; ?>
            </td>
            <td><?php echo $user['uname']; ?></td>
            <td></td>
            <td><?php echo $user['ubalance']; ?></td>
            <td><?php echo $user['uphone']; ?></td>
            <td><?php echo $user['qq']; ?></td>
            <td><?php echo $user['memid']; ?></td>
            <td>
                <?php if($user['state'] == 0): ?> 使用
                    <?php elseif($user['state'] == 1): ?>锁定
                    <?php else: endif; ?>
            </td>
            <td><?php echo $user['rigtime']; ?></td>
            <td>
                <?php if($user['state'] == 0): ?>
                <input type="button" value="锁定" class="btn btn-default" onclick="closeUser('<?php echo $user['id']; ?>')">
                <?php elseif($user['state'] == 1): ?>
                <input type="button" value="使用" class="btn btn-default" onclick="openUser('<?php echo $user['id']; ?>')">
                <?php else: endif; ?>
                <input type="button" value="重置密码" class="btn btn-default" onclick="resetPwd('<?php echo $user['id']; ?>')">
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <!-- BatchOperation -->
    <div style="overflow:hidden;">
        <div class="BatchOperation fl">
            <input type="checkbox" id="del"/>
            <label for="del" class="btnStyle middle">全选</label>
        </div>
        <div class="turnPage center fr">
            <?php echo $list->render(); ?>
        </div>
    </div>
</div>
</body>
<script>
    $usermgmt = "<?php echo url('index/link/usermgmt'); ?>";
    $openUser_url = "<?php echo url('index/user/openUser'); ?>";
    $closeUser_url = "<?php echo url('index/user/closeUser'); ?>";
    $resetPwd_url = "<?php echo url('index/user/resetPwd'); ?>";
</script>
<script src="__STATIC__/js/usermgmt.js"></script>
</html>