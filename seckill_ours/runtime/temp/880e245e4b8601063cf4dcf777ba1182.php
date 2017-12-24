<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\AppServ\www\seckill_ours\public/../application/index\view\link\login.html";i:1513945005;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>后台登录首页</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="nofollow"/>
    <link href="__STATIC__/css/adminStyle.css" rel="stylesheet" type="text/css">
    <style>
        body{width:100%;height:100%;overflow:hidden;background:url("__STATIC__/img/pc_loginBg.jpg") no-repeat;background-size:cover;position:absolute;}
    </style>
</head>
<body>
<section class="loginform">
    <h1>后台管理系统</h1>
    <ul>
        <li>
            <label>账号：</label>
            <input id="admin" type="text" class="textBox" placeholder="管理员账号"/>
            <div id="checkadmin"></div>
        </li>
        <li>
            <label>密码：</label>
            <input id="admin_pwd" type="password" class="textBox" placeholder="登陆密码"/>
            <div id="checkpwd"></div>
        </li>
        <li>
            <img id="codeimg" src="<?php echo captcha_src(); ?>" alt="captcha" onclick="changeCode(this)"/>
        </li>
        <li>
            <label>验证码：</label>
            <input id="auth_code" type="password" class="textBox" placeholder="验证码"/>
            <div id="checkcode"></div>
        </li>
        <li>
            <input type="button" value="立即登陆" id="admin_login">
        </li>
    </ul>
</section>
</body>
</html>
<script>
    var loginAjax="<?php echo url('index/index/dologin'); ?>";
    var codeurl="<?php echo captcha_src(); ?>";
</script>
<script src="__STATIC__/js/jquery.js"></script>
<script src="__STATIC__/js/Particleground.js"></script>
<script src="__STATIC__/js/public.js"></script>
<script src="__STATIC__/js/login.js"></script>