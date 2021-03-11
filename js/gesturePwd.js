/**
 * Created by 没猫撸 on 2019/12/26.
 */
$(function () {


    $('#other_login').click(function () {//使用其他账号登录时，清除localStorage
        localStorage.clear();
        window.location.href = "web/login.html";
    });

    $("#gesturepwd").GesturePasswd({
        // backgroundColor:"#252736a8",
        color: "#333", //主要的控件颜色
        roundRadii: 80, //大圆点的半径
        pointRadii: 25, //大圆点被选中时显示的圆心的半径
        space: 80, //大圆点之间的间隙
        width: 700, //整个组件的宽度
        height: 700, //整个组件的高度
        lineColor: "#00aec7", //用户划出线条的颜色
        zindex: 100 //整个组件的css z-index属性
    });


    $("#gesturepwd").on("hasPasswd", function (e, passwd) {
        var userID = JSON.parse(localStorage.getItem('data'));
        // console.log(userID);
        var password = passwd;
        if (userID == null) {
            alert('当前无法用手势登录！');
            setTimeout(function () {
                window.location.href = "login.html";
            }, 500); //延迟半秒以照顾视觉效果
        }
        $.ajax({
            type: "POST",
            url: "./controller/gestureLogin.php",
            data: {"owner_number": userID['owner_number'], "password": password},
            dataType: "json",
            success: function (data) {
                if (data == 1) {
                    $("#gesturepwd").trigger("passwdRight");
                    setTimeout(function () {
                        window.location.href = "home.php";
                        //密码验证正确后的其他操作，打开新的页面等。。。
                    }, 500); //延迟半秒以照顾视觉效果
                }
            }, error: function (err) {
                // alert('cao')
                $('.tips').text('手势错误，请再试一次').css('color', '#ff5722');
                $("#gesturepwd").trigger("passwdWrong");
                shake("tips");
                //密码验证错误后的操作
            }

        });

        function shake(o) {//抖动效果
            var $panel = $("." + o);
            box_left = 0;
            //box_left = $panel.css('left');
            //box_left = ($(window).width() -  $panel.width()) / 2;
            $panel.css({'left': box_left, 'position': 'relative'});
            for (var i = 1; 4 >= i; i++) {
                $panel.animate({left: box_left - (20 - 5 * i)}, 30);
                $panel.animate({left: box_left + (20 - 5 * i)}, 30);
            }
        }

    });
});

