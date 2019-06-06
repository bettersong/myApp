<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
            <title>妖刀商城</title>
            <meta name="format-detection" content="telephone=no" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
            <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/bui.css" />
            <style>
                .mineImg{width:100px;height:100px;}
                .bui-dropdown>.active {background: #39a4ff !important;}
            </style>
        </head>
<body>

<div class="bui-page" id="page">
    <header class="bui-bar bui-bar-center">
        <div class="bui-bar-left">
            <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
        </div>
        <div class="bui-bar-main">
       修改密码
        </div>
        <div class="bui-bar-right">
           
        </div>

    </header>
    <main>
        <!-- 横向 -->
        <div id="step" class="bui-stepbar-line"></div>
        <div class="stepbar-wrap">
            <div class="stepbar">
                <ul class="bui-list">
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label">用户名:</label>
                        <div class="span1">
                            <div class="bui-input user-input">
                                <input id="username" type="text" class="bui-input" value="" placeholder="请输入用户名">
                            </div>
                        </div>
                    </li>
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label">密&nbsp;&nbsp;&nbsp;码:</label>
                        <div class="span1">
                            <input id="oldPassword" type="password" class="bui-input" value="" placeholder="请输入密码">
                        </div>
                    </li>
                </ul>
                <div class="container-xy">
                    <div class="bui-btn round primary step1">提交</div>
                </div>
            </div>
            <div class="stepbar" style="display: none;">
                <ul class="bui-list">
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label" >密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</label>
                        <div class="span1">
                            <div class="bui-input user-input">
                                <input id="newPassword" type="password" class="bui-input" value="" placeholder="请输入新密码">
                            </div>
                        </div>
                    </li>
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label">确认密码:</label>
                        <div class="span1">
                            <div id="passwordInput" class="bui-input">
                                <input id="rePassword" type="password" placeholder="请确认密码">
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="container-xy">
                    <div class="bui-btn round primary step2">确定修改</div>
                </div>
            </div>
            <div class="stepbar" style="display: none;">
                <div class="bui-box-center">
                    <div class="tips">
                        <i class="icon-successfill xxlarge success"></i>
                        <div class="item-title">修改成功</div>
                        <div class="item-text">描述信息</div>
                    </div>
                </div>
                <div class="container-xy bui-interval">
                    <div class="bui-btn round primary btn-prev-step">返回上一步</div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="/MyApp/YaoDaoApp/Public/js/zepto.js"></script>
<script src="/MyApp/YaoDaoApp/Public/js/bui-1.5.2.js"></script>
<script>
    bui.ready(function () {
        var uiStepbar = bui.stepbar({
            id: "#step",
            data: [{
                title: "验证身份",
            },{
                title: "重置密码",
            },{
                title: "完成",
            }],
            direction: "x",
            click: false,
            lineCenter: true,
            hasNumber: true
        });

        uiStepbar.on("change",function (e) {
            $(".stepbar").hide().eq(e).show();
        })
        //激活第1步
        uiStepbar.value(0);

        $(".step1").on("click",function (argument) {
            var username = $('#username').val();
            var oldPassword = $('#oldPassword').val();
            $.ajax({
                url:'/MyApp/YaoDaoApp/App/User/userCheck',
                type:'post',
                data:{
                    'username':username,
                    'oldPassword':oldPassword
                },
                success:function(msg){
                console.log(msg);
                if(msg==1){
                    bui.hint("验证通过");
                    uiStepbar.next();
                }else{
                    bui.hint("验证失败");
                    return;
                }
                },
                error:function(msg){
                   bui.alert(msg);
                }
            })
            //console.log(username,oldPassword);


        })
        $(".step2").on("click",function (argument) {
            var newPassword = $('#newPassword').val();
            var rePassword = $('#rePassword').val();
            if(newPassword == ''){
                bui.alert("请输入新密码");
                return;
            }
            else if(newPassword != rePassword){
                bui.alert("两次密码输入不一致");
                return;
            }
            $.ajax({
                url:'/MyApp/YaoDaoApp/App/User/updatepwd',
                type:'post',
                data:{
                    'newPassword':newPassword,
                    'rePassword':rePassword
                },
                success:function(msg){
                 console.log(msg);
                 if(msg==1){
                     uiStepbar.next();
                 }else{
                     bui.alert("修改密码失败");
                 }
                 //
                },
                error:function(msg){
                     bui.alert(msg);
                }
            })

        })
        $(".btn-prev-step").on("click",function (argument) {
            uiStepbar.prev();
        })
        
        });
        
</script>
</body>
</html></title>
</head>
<body>

</body>
</html>