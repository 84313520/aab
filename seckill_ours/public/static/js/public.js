/**
 * Created by im on 2017/12/22.
 */
//config
var config = {
    //'ctype':['全部','1'],

};


//正则 用于用户名
function checkall(all)
{
    //判断用户名是否合法（正则）
    var regu =/^[0-9a-zA-Z\_]{4,12}$/;
    var regObj = RegExp(regu);//可以检验是否合法
    if(regObj.test(all)){
        return true;
    }else{
        return false;
    }
}
//验证码 正则
function checkcCode(all)
{
    //判断用户名是否合法（正则）
    var regu =/^[0-9a-zA-Z\_]{4,4}$/;
    var regObj = RegExp(regu);//可以检验是否合法
    if(regObj.test(all)){
        return true;
    }else{
        return false;
    }
}