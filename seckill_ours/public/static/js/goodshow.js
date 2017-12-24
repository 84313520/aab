/**
 * Created by im on 2017/12/23.
 */
//循环商品类型表
for(var i=0;i<ctype.length;i++){
    $('#select1').append("<option value="+(i)+">"+ctype[i]+"</option>");
}
//循环商品分类表
for(var p=0;p<csort.length;p++){
    $('#select2').append("<option value="+(p)+">"+csort[p]+"</option>");
}
//循环商品状态表
for(var k=0;k<cstate.length;k++){
    $('#select3').append("<option value="+(k)+">"+cstate[k]+"</option>");
}
function look(){
    console.log($("#select1").val(),$("#select2").val(),$("#select3").val(),$("#content").val());
    $.ajax({
        url:lookurl,
        type:"get",
        data:{ctname:$("#select1").val(),csname:$("#select2").val(),
            cstname:$("#select3").val(),content:$("#content").val()},
        //dataType:"xml",
        success:function (res){
            $('body').html(res);
            //console.log(res,typeof (res));
        },
        error: function (res) {

        }
    });
}
//// 自动调用click事件
//$("#search").trigger("click");
//上架,下架
function up(cid,cstname){
    //console.log(cid,cstname);
    if(cstname=='上架'){
        alert('该商品正在上架')
    }
    else{
        $.ajax({
            url:upurl,
            type:"get",
            data:{cid:cid},
            success:function (res){
                console.log(res);
                if(res.code=='501'){
                    alert(res.msg);
                    location.reload();
                }

            },
            error: function (res) {

            }
        })
    }
}
function down(cid,cstname){
    if(cstname=='下架'){
        alert('该商品已经下架')
    }
    else{
        $.ajax({
            url:downurl,
            type:"get",
            data:{cid:cid},
            success:function (res){
                console.log(res);
                if(res.code=='502'){
                    alert(res.msg);
                    location.reload();
                }

            },
            error: function (res) {

            }
        })
    }
}
//删除
//function dele(cid){
//    $.ajax({
//        url:deleurl,
//        type:"get",
//        data:{cid:cid},
//        success:function (res){
//            console.log(res);
//            if(res.code=='503'){
//                alert(res.msg);
//                location.reload();
//            }
//
//        },
//        error: function (res) {
//
//        }
//    })
//}
