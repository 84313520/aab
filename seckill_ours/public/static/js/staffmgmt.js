/**
 * Created by wjj on 2017/12/23.
 */
//   搜索
function changed(){
    //alert(changedUrl);
    $.ajax({
        url:changedUrl,
        method:"get",
        data:{'select':$('#lock').val(),'input':$('#input').val()},
        success:function (res){
            $('body').html(res);
        },
        error: function (err) {
            console.log(err);
        }
    });
}
//  锁定
function clock(sid){
    $.ajax({
        url:clockUrl,
        method:"get",
        data:{'sid':sid},
        success:function (res){
            //$('body').html(res);
            alert(res.msg);
            if(res.code=='300'){
                location.reload();
            }
        }
    });
}
//    使用
function use(sid){
    $.ajax({
        url:useUrl,
        method:"get",
        data:{'sid':sid},
        success:function (res){
            alert(res.msg);
            if(res.code=='302'){
                location.reload();
            }
        }
    });
}
// 重置密码