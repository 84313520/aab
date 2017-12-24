<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\AppServ\www\seckill_ours\public/../application/index\view\link\goodshow.html";i:1514102927;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品显示</title>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
    <!--<meta name="robots" content="nofollow"/>-->
    <link href="__STATIC__/css/goodshow.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="menu-list-right">
    <div class="page-title">
        <span class="modular fl"><i style="background:url('__STATIC__/img/admin_bg.png')-4px -44px;"></i><em>产品列表</em></span>
        <span class="modular fr"><a href="#" class="pt-link-btn">+添加商品</a></span>
    </div>
    <select class="inline-select" id="select1">
        <!--<option id="ctype" value="0">全部</option>-->
    </select>
    <select class="inline-select" id="select2">
        <!--<option id="csort" value="0">全部</option>-->
    </select>
    <select class="inline-select" id="select3">
        <!--<option id="cstate" value="0">全部</option>-->
    </select>
    <input type="text" class="textBox length-long" placeholder="输入产品名称..." id="content"/>
    <input type="button" value="查询" class="tdBtn" id="search" onclick="look()"/>
    <table class="list-style Interlaced">
        <tr>
            <th>ID编号</th>
            <th>名称</th>
            <th>简介</th>
            <th>图片</th>
            <th>市场价</th>
            <th>会员价</th>
            <th>商品类型</th>
            <th>商品状态</th>
            <th>发布时间</th>
            <th>上架时间</th>
            <th>总量</th>
            <th>库存</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($defaultres) || $defaultres instanceof \think\Collection || $defaultres instanceof \think\Paginator): $i = 0; $__LIST__ = $defaultres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$defaultshop): $mod = ($i % 2 );++$i;?>
        <tr id="tablenone">
            <td>
                 <span><i><?php echo $defaultshop['cid']; ?></i></span>
            </td>
            <td class="center pic-area"><?php echo $defaultshop['cname']; ?></td>
            <td class="td-name">
                <span class="ellipsis td-name block"><?php echo $defaultshop['introduction']; ?></span>
            </td>
            <td class="center pic-pic">
                <img src="#">
            </td>
            <td class="center">
                 <span><i>￥</i><em><?php echo $defaultshop['price']; ?></em></span>
            </td>
            <td class="center">
                 <span><i>￥</i><em>暂定</em></span>
            </td>
            <td class="center">
                 <span><?php echo $defaultshop['ctname']; ?></span>
            </td>
            <td class="center">
                <span><?php echo $defaultshop['cstname']; ?></span>
            </td>
            <td class="center pic-area">
                <span><?php echo $defaultshop['ftime']; ?></span>
            </td>
            <td class="center pic-area">
                <span><?php echo $defaultshop['stime']; ?></span>
            </td>
            <td class="center">
                <span><?php echo $defaultshop['cinventory']; ?><i>件</i></span>
            </td>
            <td class="center">
                <span><?php echo $defaultshop['stock']; ?><i>件</i></span>
            </td>
            <td class="center">
                <input type="button" value="上架" onclick="up('<?php echo $defaultshop['cid']; ?>','<?php echo $defaultshop['cstname']; ?>')">
                <input type="button" value="下架" onclick="down('<?php echo $defaultshop['cid']; ?>','<?php echo $defaultshop['cstname']; ?>')">
                <input type="button" value="修改">
                <input type="button" value="删除" onclick="dele('<?php echo $defaultshop['cid']; ?>')">
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="page">
        <?php echo $defaultres->render(); ?>
    </div>
</div>
</body>
</html>
<script>
    var lookurl="<?php echo url('index/Link/goodshow'); ?>";
    var upurl="<?php echo url('index/Commodity/upurl'); ?>";
    var downurl="<?php echo url('index/Commodity/downurl'); ?>";
    var deleurl="<?php echo url('index/Commodity/deleurl'); ?>";
</script>
<script src="__STATIC__/js/jquery.js"></script>
<script src="__STATIC__/js/goodshow_select.js"></script>
<script src="__STATIC__/js/goodshow.js"></script>
