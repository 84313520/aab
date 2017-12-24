/**
 * Created by im on 2017/12/21.
 */
//插件显示login页面效果
$(document).ready(function() {
    $('body').particleground({
        dotColor:'green',
        lineColor:'#c9ec6e'
    });
});
//验证码,也可以用$this
function changeCode(obj){
    $(obj).attr('src',codeurl);
    //obj.src=yzmurl;
}

//登录账号失去焦点验证
$('#admin').blur(function(){
    if($(this).val() == '')
    {
        $('#checkadmin').css('color','red');
        $('#checkadmin').html('输入不能为空')
    }
    else if($(this).val().length <4 || $(this).val().length > 12)
    {
        $('#checkadmin').css('color','red');
        $('#checkadmin').html('输入的长度应为4-12位')
    }
    else if(!checkall($(this).val()))
    {
        $('#checkadmin').css('color','red');
        $('#checkadmin').html('输入不合法')
    }
    else
    {
        $('#checkadmin').css('color','green');
        $('#checkadmin').html('√');
    }
});
//登录密码失去焦点验证
$('#admin_pwd').blur(function(){
    if($(this).val() == '')
    {
        $('#checkpwd').css('color','red');
        $('#checkpwd').html('输入不能为空')
    }
    else if($(this).val().length <6 || $(this).val().length > 12)
    {
        $('#checkpwd').css('color','red');
        $('#checkpwd').html('输入的长度应为6-12位')
    }
    else if(!checkall($(this).val()))
    {
        $('#checkpwd').css('color','red');
        $('#checkpwd').html('输入不合法')
    }
    else
    {
        $('#checkpwd').css('color','green');
        $('#checkpwd').html('√');
    }
});
//验证码失去焦点验证
$('#auth_code').blur(function(){
    if($(this).val() == '')
    {
        $('#checkcode').css('color','red');
        $('#checkcode').html('输入不能为空')
    }
    else if(!checkcCode($(this).val()))
    {
        $('#checkcode').css('color','red');
        $('#checkcode').html('长度应为4位,输入不合法')
    }
    else
    {
        $('#checkcode').css('color','green');
        $('#checkcode').html('√');
    }
});
//登入判断
$("#admin_login").on('click',function(){
    var admin=$("#admin").val();
    var admin_pwd=$("#admin_pwd").val();
    var auth_code=$("#auth_code").val();
    if(admin==''||admin_pwd==''||auth_code==''){
        alert('不能为空')
    }
    else{
        if(checkall(admin)&&checkall(admin_pwd)&&checkcCode(auth_code)){
            $.ajax({
                url:loginAjax,
                type:"post",
                data:{admin:admin,admin_pwd:admin_pwd,auth_code:auth_code},
                dataType:"json",
                success:function(res){
                    //console.log(res);
                    if(res.code=='204'){
                        alert(res.msg);//判断验证码
                        changeCode($("#codeimg")[0]);
                    }
                    else if(res.code=='201'){
                        alert(res.msg);//用户不存在
                        changeCode($("#codeimg")[0]);
                    }
                    else if(res.code=='200'){
                        alert(res.msg);//登入成功
                        location.href=res.data.url;
                    }
                    else{
                        alert(res.msg);//密码不正确
                        changeCode($("#codeimg")[0]);
                    }
                },
                error:function(res){

                }
            })
        }
        else{
            alert('非法输入');
        }
    }
});
////当三个都为√时,调用
//function tick(){
//    if($("#checkadmin").html()=="√"&&$("#checkpwd").html()=="√"&&$("#checkcode").html()=="√"){
//        $("#admin_login").removeAttr("disabled");
//        $("#admin_login").on('click',function(){
//            var admin=$("#admin").val();
//            var admin_pwd=$("#admin_pwd").val();
//            var auth_code=$("#auth_code").val();
//            $.ajax({
//                url:loginAjax,
//                type:"post",
//                data:{admin:admin,admin_pwd:admin_pwd,auth_code:auth_code},
//                dataType:"json",
//                success:function(res){
//                    //console.log(res);
//                    if(res.code=='204'){
//                        alert(res.msg);//判断验证码
//                        changeCode($("#codeimg")[0]);
//                    }
//                    else if(res.code=='201'){
//                        alert(res.msg);//用户不存在
//                    }
//                    else if(res.code=='200'){
//                        alert(res.msg);//登入成功
//                        location.href=res.data.url;
//                    }
//                    else{
//                        alert(res.msg);//密码不正确
//                        changeCode($("#codeimg")[0]);
//                    }
//                },
//                error:function(res){
//
//                }
//            })
//        });
//    }
//}

