/**
 * Created by 84313 on 2017/12/22.
 */
var vue = new Vue({
    el:'#menu',
    data:{
        menuArr:[]
    },
    created: function () {
        $.ajax({
            url:menuUrl,
            success: function (res) {
                console.log(res);
                this.menuArr = res.data;


            }.bind(this)
        });

    },
    updated: function () {
        //菜单的效果
            //Tabel Interlaced background color 2015-04-20 DeathGhost
            $('.Interlaced tr:odd').addClass('trbgcolor');
            //left menu toggle style
            $('.menu-list-title').click(function(){

                $(this).next('li').toggle('1500');
            });
            //menu current background color
            $(".menu-children li").click(function(){
                console.log($(this).attr('href'));
                $(".menu-children li").css({background:'none'});
                $(this).css({background:'#f35844'});
                $("#iframe1").prop('src',$(this).attr('href'));
                console.log($("#iframe1").prop('src'));
            });

    }
    
});



