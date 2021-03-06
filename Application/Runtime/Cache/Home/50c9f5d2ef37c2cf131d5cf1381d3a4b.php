<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>首页</title>
    <link rel="stylesheet" type="text/css" href="/safelabbill/Public/CSS/bootstrap.css" />
    <script type="text/javascript" src="/safelabbill/Public/JS/jquery.js"></script>
    <script type="text/javascript" src="/safelabbill/Public/JS/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/safelabbill/Public/CSS/base.css" />

    <script>

        var error = new Array();
//        $(function(){
//        实际上这里不用使用这些，因为我们的bootstrap 已经做了验证了 。直接给button设置为 submit 格式即可。  
//           
//            $("button[id='btn_login']").click(function(){
//                $("form[name='login_form']").submit();
//            });
//             $("button[id='btn_register']").click(function(){
//                //跳转到另外一个连接
//            });
//        });

        $(function () {
            $("button[id='btn_register']").click(function () {
                //跳转到另外一个连接
                window.location.href = "/safelabbill/index.php/Home/Register/register";
            });
        });

        $(function () {
            //ajax 判断验证码是否正确,后台也需要另行判断
            $("input[name='verify_ma']").blur(function () {
                var verify_ma = $(this).val();// 写完 alert一下，确保能取到.
                if (verify_ma != null && verify_ma != "") {
                    $.ajax({
                        type: 'get',
                        url: '/safelabbill/index.php/Home/Login/check_ma',
                        data: 'verify_ma=' + verify_ma,
                        async: false,
                        success: function (data) {
                            if (data == '0') {
                                error['check_ma'] = 0;//验证码正确
                                $("#mmessage").html("")
                            } else {
                                error['check_ma'] = 1;//验证码错误
                                $("#mmessage").html("验证码错误")
                                //验证码错误的话，最好刷新验证码当前值
                                var src = $("#verify_img")[0].src;
                                //这里$("#verify_img")[0].src 而不是 $("#verify_img").src。是因为src是JS的属性。加个[0]转换为DOM对象，而不用jQuery对象。
                                $("#verify_img").attr('src', src + '?' + Math.random());
                            }
                        }
                    });
                }
            });

            //验证码再次聚焦的时候将原来的错误信息删除
            $("input[name='verify_ma']").focus(function () {
                if (error['check_ma'] == 1) {
                    $(this).val("");
                    $("#mmessage").html("");
                }

            });
        });

        //检测是否该提交
        function checkSubmit() {
//          一定要注意 || 号两边的空格。
            if (error['check_ma'] == 1) {
//                   alert('错误');
                return false;
            } else {
//                   alert('正确');
                return true;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <form action="/safelabbill/index.php/Home/Login/do_login" method="post" autocomplete="off" name="login_form" onsubmit="return checkSubmit()">
            <input type="text" style="display:none" />
            <input type="password" style="display:none" />
            <div class="form-group">
                <label for="username">用户名</label>
                <input type="text" autocomplete="off" class="form-control" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" autocomplete="off" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="verify_ma">验证码</label>
                <input type="text" autocomplete="off" class="form-control" name="verify_ma" id="verify_ma" required>
                <p id="mmessage" style="color:red"></p>
            </div>
            <div class="form-group"><img src="/safelabbill/index.php/Home/Public/index" onclick="this.src = this.src + '?' + Math.random()" style="display: inline"></div> 
<!--            <div class="checkbox">
                <label>
                    <input type="checkbox"> 记住账户
                </label>
            </div>-->
            <button type="submit"  id="btn_login" class="btn btn-default col-xs-3" >登录</button>
        </form>
        <!--注册按钮可以放在表单外面，点击的时候，直接另行跳转-->
        <button id="btn_register" class="btn btn-default col-xs-offset-6 col-xs-3">注册</button>
    </div>

</body>
</html>