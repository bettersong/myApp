<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>BUI</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/bui.css" />
</head>
<body>
    <div class="bui-page" id="page">
        <header class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">我的消息</div>
            <div class="bui-bar-right">
                <!-- 右边按钮位置 -->
            </div>
        </header>
        <main>
        	<div id="scrollSearch" class="bui-scroll">
    <div class="bui-scroll-head"></div>
    <div class="bui-scroll-main">
        <ul class="bui-list newsList">
        </ul>
    </div>
    <div class="bui-scroll-foot"></div>
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
            var uiBtn = bui.btn({id:"#page",handle:'.bui-btn'}).load();
            var uiList = bui.list({
            id: "#scrollSearch",
            url: "/MyApp/YaoDaoApp/App/Mine/selectnews",
            pageSize: 5,
            data: {},
            field: {
                page: "page",
                size: "pageSize",
                data: "data"
            },
            callback: function(e) {

            },
            template: function(data){
                var html = "";
                data.map(function(el, index){
                    var param = {"id":el.bid};
                    var paramStr = JSON.stringify(param);
                    html += `<li param='${paramStr}' class='bui-btn' href="/MyApp/YaoDaoApp/App/Mine/informdetail?nid=${el.nid}">
                <h3 class="item-title"><span class="${el.ntypecolor}-reverse">【${el.ntype}】</span>${el.ncontent}</h3>
                <p class="item-text">${el.ntime}</p>
            </li>`;
                });
                return html;
            }
        });
        })
    </script>
</body>
</html>