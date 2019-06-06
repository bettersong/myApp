<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>妖刀商城</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/bui.css" />
    <style>
        .box-card{box-shadow: 1px 2px 5px #ccc;padding: 20px;border-radius: 5px;}
        .box-card-money{border-left:5px solid #ffcc33}
        .box-card-prefer{border-left:5px solid #f81c11}
    </style>
</head>
<body>
    <div class="bui-page">
        <header class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">我的卡券</div>
            <div class="bui-bar-right">
                <!-- 右边按钮位置 -->
            </div>
        </header>
        <main>
            <div id="uiTab" class="bui-tab">
                <div class="bui-tab-head">
                    <ul class="bui-nav">
                        <li class="bui-btn">代金券</li>
                        <li class="bui-btn buiOthers" type="1">优惠券</li>
                        <li class="bui-btn buiOthers" type="2">福利卡</li>
                    </ul>
                </div>
                <div class="bui-tab-main">
                    <ul>
                        <!-- 内容必须在li里面 -->
                        <li>
                            <div class="section-title">1代金券=1元，购书时优先扣除</div>
                            <ul class="bui-list">
                                <li class="bui-btn">
                                    <div class="bui-box-align-middle box-card box-card-money">

                                    <span class="item-text" style="font-size: 22px;color: #ffcc33">30</span>
                                        <span class="span1" style="font-size: 14px">代金券</span>
                                    <p class="item-text">有效期至2019-10-02 10:44</p>
                                    </div>
                                </li>
                                <li class="bui-btn">
                                    <div class="bui-box-align-middle box-card box-card-money">

                                        <span class="item-text" style="font-size: 22px;color: #ffcc33">50</span>
                                        <span class="span1" style="font-size: 14px">代金券</span>
                                        <p class="item-text">有效期至2019-10-02 10:44</p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li style="display:none;">
                            <div class="section-title">购VIP，可用VIP券；购书，可用书籍券</div>
                            <ul class="bui-list">
                                <li class="bui-btn">
                                    <div class="bui-box-align-middle box-card box-card-prefer">

                                        <span class="item-text" style="font-size: 22px;color: #f81c11">16</span>
                                        <span class="span1" style="font-size: 14px">优惠券</span>
                                        <p class="item-text">有效期至2019-10-02 10:44</p>
                                    </div>
                                </li>
                                <li class="bui-btn">
                                    <div class="bui-box-align-middle box-card box-card-prefer">

                                        <span class="item-text" style="font-size: 22px;color: #f81c11">30</span>
                                        <span class="span1" style="font-size: 14px">优惠券</span>
                                        <p class="item-text">有效期至2019-10-02 10:44</p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li style="display:none;">
                           <div class="section-title">使用福利卡充值，可享受代金券赠送</div>
                            <ul class="bui-list bui-box-center">
                                <li class="bui-btn" style="padding: 0px;background: #fcfcfc">
                                    <img src="/MyApp/YaoDaoApp/Public/images/useout.png">
                                    <div class="span1 bui-box-align-center">无可用福利卡,<span class="bui-btn" style="color:red;border:none;padding:0px">去领取</span></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
        </main>
        <footer>
            <!-- 底部内容 此处内容固定在页面底部 -->
        </footer>
    </div>
    <script src="/MyApp/YaoDaoApp/Public/js/zepto.js"></script>
    <script src="/MyApp/YaoDaoApp/Public/js/bui.js"></script>
    <script>
        bui.ready(function () {
            // 控件初始化
            var uiTab = bui.tab({
                id:"#uiTab"
            });
        })
    </script>
</body>
</html>