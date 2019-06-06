<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>商城</title>
    <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/bui.css" />
</head>
<body>
<div class="bui-page login">
    <header class="bui-bar">
        <div class="bui-bar-left"></div>
        <div class="bui-bar-main">登录</div>
        <div class="bui-bar-right"></div>
    </header>
    <main>
        <form action="setlogin" method="post">
        <div class="bui-list">
            <div class="bui-btn bui-box clearactive">
                <div class="bui-label">账户</div>
                <div class="span1">
                    <input type="text" id="username" name="username" class="bui-input" value="" placeholder="昵称">
                </div>
            </div>
            <div class="bui-btn bui-box clearactive">
                <div class="bui-label">密码</div>
                <div class="span1">
                    <input type="password" id="password" name="password" class="bui-input" value="" placeholder="密码">
                </div>
            </div>
        </div>
        <div class="container-xy">
            <div class="bui-btn round success" id="login">立即登录</div>
        </div>
        <div class="bui-box-align-justify quick-link">
            <a class="bui-btn no-border"  href="/MyApp/YaoDaoApp/App/User/showregist" >快速注册</a>
        </div>
        </form>
    </main>
</div>
<script src="/MyApp/YaoDaoApp/Public/js/zepto.js"></script>
<script src="/MyApp/YaoDaoApp/Public/js/bui-1.5.2.js"></script>
<script>
    bui.ready(function(){
        console.log('/MyApp/YaoDaoApp');
        $('#login').on('click',function(){
            //var bid = 2;
            var username = $('#username').val();
            var password = $('#password').val();
            console.log(username,password);
            //return false;
            $.ajax({
                async:false,
                type: "post",
                data: {
                    "username":username,
                    "password":password
                },
                dataType: 'json',
                url: "/MyApp/YaoDaoApp/App/User/setlogin",
                success: function (msg) {
                    //alert(msg[0]['author']);
                    console.log(msg);
                    //return;

                        window.location.href="/MyApp/YaoDaoApp/App/Index/index"

                },
                error: function (msg) {
                    bui.alert("账号或密码错误！");
                    console.log(msg);
                }
            });
        })
    })

</script>
</body>
</html>