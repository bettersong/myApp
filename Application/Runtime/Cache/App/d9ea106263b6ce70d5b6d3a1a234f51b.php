<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>妖刀商城</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/bui.css" />
    <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/style.css"/>
</head>
<body>

<div class="bui-page">
    <header class="bui-bar">
    </header>
    <main>
        <!-- 搜索条控件结构 -->
        <div id="searchbar" class="bui-searchbar bui-box">
            <div class="span1">
                <div class="bui-input">
                    <i class="icon-search"></i>
                    <input type="search" value="" placeholder="请输入关键字"/>
                </div>
            </div>
            <div class="btn-search">搜索</div>
        </div>
        <div id="uiTab" class="bui-tab">
            <div class="bui-tab-head">
                <ul class="bui-nav">
                    <li class="bui-btn">全部</li>
                    <li class="bui-btn buiOthers" type="1">新品</li>
                    <li class="bui-btn buiOthers" type="2">热门</li>
                    <li class="bui-btn buiOthers" type="3">限免</li>
                    <li class="bui-btn buiOthers" type="4">经典</li>
                </ul>
            </div>
            <div class="bui-tab-main">
                <ul>
                    <!-- 内容必须在li里面 -->
                    <li>
                        <!-- 列表控件结构 -->
                        <div id="scrollSearch" class="bui-scroll">
                            <div class="bui-scroll-head"></div>
                            <div class="bui-scroll-main">
                                <ul class="bui-list bookList">

                                </ul>
                            </div>
                            <div class="bui-scroll-foot"></div>
                        </div>
                    </li>
                    <li style="display: none;">
                        <div id="scrollSearch1" class="bui-scroll">
                            <div class="bui-scroll-head"></div>
                            <div class="bui-scroll-main">
                                <ul class="bui-list bookList">

                                </ul>
                            </div>
                            <div class="bui-scroll-foot"></div>
                        </div>
                    </li>
                    <li style="display: none;">
                        <div id="scrollSearch2" class="bui-scroll">
                            <div class="bui-scroll-head"></div>
                            <div class="bui-scroll-main">
                                <ul class="bui-list bookList">

                                </ul>
                            </div>
                            <div class="bui-scroll-foot"></div>
                        </div>
                    </li>
                    <li style="display: none;">
                        <div id="scrollSearch3" class="bui-scroll">
                            <div class="bui-scroll-head"></div>
                            <div class="bui-scroll-main">
                                <ul class="bui-list bookList">

                                </ul>
                            </div>
                            <div class="bui-scroll-foot"></div>
                        </div>
                    </li>
                    <li style="display: none;">
                        <div id="scrollSearch4" class="bui-scroll">
                            <div class="bui-scroll-head"></div>
                            <div class="bui-scroll-main">
                                <ul class="bui-list bookList">

                                </ul>
                            </div>
                            <div class="bui-scroll-foot"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <footer>
        <!-- 底部内容 此处内容固定在页面底部 -->
    </footer>
</div>
<script src="/MyApp/YaoDaoApp/Public/js/zepto.js"></script>
<script src="/MyApp/YaoDaoApp/Public/js/bui-1.5.2.js"></script>
<script>
    bui.ready(function(){
        console.log("/MyApp/YaoDaoApp/App/Book/");
        var uiTab = bui.tab({
            id:"#uiTab"
        });
        $('.buiOthers').on('click',function(){
            var type = $(this).attr('type');
            console.log(type);
            bui.ajax({
                url: "/MyApp/YaoDaoApp/App/Book/selectOthers",
                method:'post',
                data: {
                    'type' : type,
                }
            }).then(function(res){
                console.log(res);
                var ulList = '';
                $.each(res,function (index,row) {
                    ulList += ' <li> <a class="bui-btn bui-box" href="/MyApp/YaoDaoApp/App/Book/indexDetil?bid='+row['bid']+'">' +
                        ' <div class="bui-thumbnail bui-sub '+row['bookmarkcolor']+'" data-sub="'+row['bookmark']+'"><img src="/MyApp/YaoDaoApp/Public/images/'+row['image']+'" alt=""></div>' +
                        ' <div class="span1"> <h3 class="item-title">'+row['bname']+'</h3> <p class="item-text"> ' +
                        '<span class="span1">作者：</span>'+row['author']+'</p> <p class="item-text"> ' +
                        '<span class="span1">出版社：</span>'+row['publishcompany']+'</p> </div> ' +
                        '<span class="price"><i>￥</i>'+row['price']+'</span> </a> </li>';
                })
               $('#scrollSearch'+type).find('.bookList').html(ulList) ;

            },function(res,status){
                console.log(status);
            })
        });

        var uiList = bui.list({
            id: "#scrollSearch",
            url: "/MyApp/YaoDaoApp/App/Book/selectAll",
            pageSize: 5,
            data: {},
            refreshTips:{
               'success':'刷新成功'
            },
            scrollTips:{
                 'nodata': "已经到底啦"
            },
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
                    html += `<li param='${paramStr}'>
                        <a class="bui-btn bui-box" href="/MyApp/YaoDaoApp/App/Book/indexDetil?bid=${el.bid}">
                            <div class="bui-thumbnail bui-sub ${el.bookmarkcolor}" data-sub="${el.bookmark}"><img src="/MyApp/YaoDaoApp/Public/images/${el.image}" alt=""></div>
                            <div class="span1">
                                <h3 class="item-title">${el.bname}</h3>
                                <p class="item-text">
                                    <span class="span1">作者：</span>
                                    ${el.author}</p>
                                <p class="item-text">
                                    <span class="span1">出版社：</span>
                                    ${el.publishcompany}</p>
                            </div>
                            <span class="price"><i>￥</i>${el.price}</span>
                        </a>
                        </li>`;
                });
                return html;
            }
        });
        //搜索条的初始化
        var uiSearchbar = bui.searchbar({
            id:"#searchbar",
            onInput: function(e,keyword) {
                console.log(keyword);
                //实时搜索
                // console.log(++n)
            },
            onRemove: function(e,keyword) {
                //删除关键词需要做什么其它处理
                // console.log(keyword);
            },
            callback: function (e,keyword) {
                var bname = keyword;
                $('.bui-scroll-foot').hide();
                $.ajax({
                    url: '/MyApp/YaoDaoApp/App/Book/userselect',
                    type: 'post',
                    data: {
                        'bname': bname
                    },
                    success: function (msg) {
                        var seachBook = JSON.parse(msg);
                        if(seachBook.length == 0){
                            bui.hint({
                                content:"<div class='icon'><img src='/MyApp/YaoDaoApp/Public/images/icon-png/icon-cry" +
                                "'</div><br />没有这本书哦",
                                position:"center" ,
                                effect:"fadeInDown"
                            });
                        }else{
                        var ulChild = '';
                        $.each(seachBook,function(index,row){
                            ulChild += ' <li> <a class="bui-btn bui-box" href="/MyApp/YaoDaoApp/App/Book/indexDetil?bid='+row['bid']+'">' +
                                ' <div class="bui-thumbnail bui-sub '+row['bookmarkcolor']+'" data-sub="'+row['bookmark']+'"><img src="/MyApp/YaoDaoApp/Public/images/'+row['image']+'" alt=""></div>' +
                                ' <div class="span1"> <h3 class="item-title">'+row['bname']+'</h3> <p class="item-text"> ' +
                                '<span class="span1">作者：</span>'+row['author']+'</p> <p class="item-text"> ' +
                                '<span class="span1">出版社：</span>'+row['publishcompany']+'</p> </div> ' +
                                '<span class="price"><i>￥</i>'+row['price']+'</span> </a> </li>';
                        })
                        $('.bookList').html(ulChild);
                        }
                    },
                    error:function () {
                    }
                })
                console.log(keyword);
            }
        });
    });
</script>
</body>
</html>