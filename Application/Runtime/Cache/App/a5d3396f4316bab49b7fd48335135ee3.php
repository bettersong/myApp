<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>妖刀商城</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/bui.css" />
    <style>
        .bookList{margin-top:.2rem;}
    </style>
</head>
<body>
    <div class="bui-page">
        <header class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">分类</div>
            <div class="bui-bar-right">
                <!-- 右边按钮位置 -->
            </div>
        </header>
        <main>
            <div class="bui-tab-wrap bui-box" style="padding-left: 2rem;">
                <ul id="tabSideNav" class="bui-list bui-tab-sidenav" style="width: 2rem;">
                    <li class="bui-btn">热销榜</li>
                    <li class="bui-btn">新品</li>
                    <li class="bui-btn">限免</li>
                    <li class="bui-btn">经典</li>
                </ul>
                <div id="tabSide" class="bui-tab">
                    <div class="bui-tab-main">
                        <ul class="bookList">
                            <li>
                                <div class="bui-list-pic bui-fluid-space-2">
                                    <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hotBook): $mod = ($i % 2 );++$i;?><div class="span1">
                                        <div class="bui-pic bui-sub warning round" data-sub="hot">
                                            <div class="bui-pic-img"><img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($hotBook["image"]); ?>" alt="" ></div>
                                            <div class="bui-pic-title" style="color:#000;"><?php echo ($hotBook["bname"]); ?></div>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </li>
                            <li style="display: none;">
                                <div class="bui-list-pic bui-fluid-space-2">
                                    <?php if(is_array($new)): $i = 0; $__LIST__ = $new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newBook): $mod = ($i % 2 );++$i;?><div class="span1">
                                            <div class="bui-pic bui-sub primary round" data-sub="new">
                                                <div class="bui-pic-img"><img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($newBook["image"]); ?>" alt="" ></div>
                                                <div class="bui-pic-title" style="color:#000;"><?php echo ($newBook["bname"]); ?></div>
                                            </div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>

                                </div>
                            </li>
                            <li style="display: none;">
                                <div class="bui-list-pic bui-fluid-space-2">
                                    <?php if(is_array($mian)): $i = 0; $__LIST__ = $mian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mianBook): $mod = ($i % 2 );++$i;?><div class="span1">
                                            <div class="bui-pic bui-sub success round" data-sub="限免">
                                                <div class="bui-pic-img"><img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($mianBook["image"]); ?>" alt="" ></div>
                                                <div class="bui-pic-title" style="color:#000;"><?php echo ($mianBook["bname"]); ?></div>
                                            </div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </li>
                            <li style="display: none;">
                                <div class="bui-list-pic bui-fluid-space-2">
                                    <?php if(is_array($jing)): $i = 0; $__LIST__ = $jing;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jingBook): $mod = ($i % 2 );++$i;?><div class="span1">
                                            <div class="bui-pic bui-sub danger round" data-sub="经典">
                                                <div class="bui-pic-img"><img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($jingBook["image"]); ?>" alt="" ></div>
                                                <div class="bui-pic-title" style="color:#000;"><?php echo ($jingBook["bname"]); ?></div>
                                            </div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
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
            var tabWidth = $(window).width() - $("#tabSideNav").width();

            //按钮在tab外层,需要传id
            var tab = bui.tab({
                id:"#tabSide",
                menu:"#tabSideNav",
                width: tabWidth,
                direction: "y",
                animate: false
            })
        })
    </script>
</body>
</html>