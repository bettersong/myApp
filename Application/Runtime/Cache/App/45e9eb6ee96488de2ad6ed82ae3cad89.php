<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>BUI</title>
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
    <header class="bui-bar bui-bar-center bui-tab-head">
        <div class="bui-bar-left">
        </div>
        <div class="bui-bar-main">
        </div>
        <div class="bui-dropdown" id="dropdown">
            <div class="bui-btn primary">
                <i class="icon-setting small" style="color: #fff"></i>
            </div>
        </div>

    </header>
    <ul class="bui-list" style="margin-top:-1px">
        <li id="buiphoto" class="bui-btn primary">
            <div id="btnUpload" class="bui-box-center" style="margin-top:-20px;">
                <?php if($userInfo['photo']!=''): ?><img src="<?php echo ($userInfo['photo']); ?>" alt="" class="ring small mineImg">
                    <?php else: ?>
                    <img src="/MyApp/YaoDaoApp/Public/images/my.png?2" alt="" class="ring small mineImg"><?php endif; ?>
            </div>
            <p class="bui-box-align-center item-btn">用户名：<?php echo ($userInfo['username']); ?></p>
        </li>
    </ul>
    <main>

        <div class="bui-box-center">
            <div class="span1 bui-nav-icon">
                <div class="bui-btn" href="/MyApp/YaoDaoApp/App/Mine/mycollect">
                    <i class="icon-fav danger large"></i>

                    <p class="bui-pic-text">我的收藏</p>

                </div>
            </div>
            <div class="span1 bui-nav-icon">
                <div class="bui-btn" href="/MyApp/YaoDaoApp/App/Mine/showCard">
                    <i class="icon-album large">&#xe679;</i>

                    <p class="bui-pic-text">我的卡券</p>

                </div>
            </div>
            <div class="span1 bui-nav-icon">
                <div class="bui-btn" href="/MyApp/YaoDaoApp/App/Mine/myInform">
                    <i class="icon-留言 primary large">&#xe633;</i>
                    <p class="bui-pic-text">我的消息</p>
                </div>
            </div>
        </div>
        <div class="section-title"></div>
        <ul class="bui-list">
            <li class="bui-box bui-btn bui-nav-icon">
                <div class="span1"><i class="icon-attention primary small">&#xe680;</i>
                    <span>发现</span>
                </div>
                <a href="">
                <i class="icon-listright"></i>
                </a>
            </li>
            <li class="bui-box bui-btn bui-nav-icon">
                <div class="span1"><i class="icon-反馈 success small">&#xe62d;</i>
                    <span>我的订单</span>
                </div>
                <a href="">
                    <i class="icon-listright"></i>
                </a>
            </li>
            <li class="bui-box bui-btn bui-nav-icon" href="/MyApp/YaoDaoApp/App/Mine/index">
                <div class="span1"><i class="icon-身份 warning small">&#xe63a;</i>
                    <span>我的信息</span>
                </div>
                    <i class="icon-listright"></i>
            </li>
            <li class="bui-box bui-btn bui-nav-icon" id="updataPwd" href="/MyApp/YaoDaoApp/App/User/update">
                <div class="span1"><i class="icon-settings primary small">&#xe612;</i>
                    <span>修改密码</span>
                </div>
                <a href="">
                    <i class="icon-listright"></i>
                </a>
            </li>
            <li class="bui-box bui-btn bui-nav-icon">
                <div class="span1"><i class="icon-doubt danger small"></i>
                    <span>帮助</span>
                </div>
                <a href="">
                    <i class="icon-listright"></i>
                </a>
            </li>
            <li class="section-title"></li>
            <li class="bui-btn bui-box-center danger" href="/MyApp/YaoDaoApp/App/User/logout">
                退出
            </li>
        </ul>
    </main>
</div>

<script src="/MyApp/YaoDaoApp/Public/js/zepto.js"></script>
<script src="/MyApp/YaoDaoApp/Public/js/bui-1.5.2.js"></script>
<script>
    bui.ready(function () {
        // 控件初始化
        var uiBtn = bui.btn({ id:"#page", handle: ".bui-btn" }).load();
        //折叠菜单示例
        var uiAccordion = bui.accordion({
            id:"#accordion"
        });
        var uiDropdown = bui.dropdown({
            id: "#dropdown",
            data: [{name:"分享",value:"share"}],
            relative: false,
            showArrow:true,
            callback:function(){
                console.log(666);
            }
        });
        //修改头像
        // 拍照上传
        var $facePhoto = $("#buiPhoto");
        var $uploadBtn = $("#btnUpload").parent();

        var uiUpload = bui.upload();

        // 上拉菜单 js 初始化:
        var uiActionsheet = bui.actionsheet({
            trigger: "#btnUpload",
            buttons: [{ name: "拍照上传", value: "camera" }, { name: "从相册选取", value: "photo" }],
            callback: function(e) {
                var ui = this;
                var val = $(e.target).attr("value");

                switch (val) {
                    case "camera":
                        ui.hide();
                        uiUpload.add({
                            "from": "camera",
                            "onSuccess": function(val, data) {
                                // 展示base64本地图片 建议直接调用start方法上传以后再展示远程地址,避免应用崩溃
                                this.toBase64({
                                    onSuccess: function(url) {
                                        var imgUrl = url;
                                        //console.log(imgUrl);
                                        $.ajax({
                                            url:'/MyApp/YaoDaoApp/App/User/userphoto',
                                            type:'post',
                                            data:{
                                                'imgUrl':imgUrl
                                            },
                                            success:function (msg) {
                                                console.log(msg);
                                                var myImg = '<img src="'+imgUrl+'" alt="" class="ring small mineImg">';
                                                $('#btnUpload').html(myImg);
                                            },
                                            error:function (msg) {
                                                console.log(msg);
                                            }
                                        })
                                    }
                                });

                            }
                        })

                        break;
                    case "photo":
                        ui.hide();
                        uiUpload.add({
                            "from": "",
                            "onSuccess": function(val, data) {
                                console.log(this);
                                // 展示base64本地图片 建议直接调用start方法上传以后再展示远程地址,避免应用崩溃
                                this.toBase64({
                                    onSuccess: function(url) {
                                        //$uploadBtn.before(templatePhoto(url))
                                        var imgUrl = url;
                                        //console.log(imgUrl);
                                        $.ajax({
                                            url:'/MyApp/YaoDaoApp/App/User/userphoto',
                                            type:'post',
                                            data:{
                                                'imgUrl':imgUrl
                                            },
                                            success:function (msg) {
                                                console.log(msg);
                                                var myImg = '<img src="'+imgUrl+'" alt="" class="ring small mineImg">';
                                                $('#btnUpload').html(myImg);
                                            },
                                            error:function (msg) {
                                                console.log(msg);
                                            }
                                        })

                                    }
                                });

                            }
                        })

                        break;
                    case "cancel":
                        ui.hide();
                        break;
                }
            }
        })

    })
</script>
</body>
</html>