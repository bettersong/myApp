<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>商城</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/bui.css" />
    <style>
        .big-title{font-weight: bold;color:#000;}

    </style>
</head>
<body>
<div class="bui-page" id="page">
    <header>
        <div class="bui-bar">
            <div class="bui-bar-left">
            </div>
            <div class="bui-bar-main">首页</div>
            <div class="bui-bar-right">
            </div>
        </div>
    </header>
    <main>
        <div id="slide" class="bui-slide bui-slide-skin01">
            <div class="bui-slide-main">
                <ul>
                    <li>
                        <img src="/MyApp/YaoDaoApp/Public/images/1.jpg" alt="占位图">
                    </li>
                    <li style="display: none;">
                        <img src="/MyApp/YaoDaoApp/Public/images/2.jpg" alt="占位图">
                    </li>
                    <li style="display: none;">
                        <img src="/MyApp/YaoDaoApp/Public/images/3.jpg" alt="占位图">
                    </li>
                </ul>
            </div>
        </div>
        <div id="slideNote" class="bui-slide bui-slide-notice">
            <div class="bui-slide-main">
                <ul>
                    <li>
                        <div class="notice-item">
                            <div class="span1">2019年1月1日 妖刀魔幻动漫更新啦！</div>
                        </div>
                    </li>
                    <li>
                        <div class="notice-item">
                            <div class="span1">2019年2月1日 都来看看啦！</div>
                        </div>
                    </li>
                    <li>
                        <div class="notice-item">
                            <div class="span1">2019年3月1日 说些什么呢！</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bui-panel panel-photo">
            <ul class="bui-list-pic">
                <li class="bui-box-center bui-nav">
                    <div class="bui-btn bui-box-vertical bui-box-align-center span1" href="/MyApp/YaoDaoApp/App/Booknav/Classification">
                        <div class="span1"><img src="/MyApp/YaoDaoApp/Public/images/icon-png/icon-fenlei.png"> </div>
                        <div class="span1">分类</div>
                    </div>
                    <div class="bui-btn bui-box-vertical bui-box-align-center span1" href="/MyApp/YaoDaoApp/App/Booknav/Ranking">
                        <div class="span1"><img src="/MyApp/YaoDaoApp/Public/images/icon-png/icon-paihang.png"> </div>
                        <div class="span1">排行</div>
                    </div>
                    <div class="bui-btn bui-box-vertical bui-box-align-center span1" href="/MyApp/YaoDaoApp/App/Booknav/FreeBook">
                        <div class="span1"><img src="/MyApp/YaoDaoApp/Public/images/icon-png/icon-mianfei.png"> </div>
                        <div class="span1">免费</div>
                    </div>
                    <div class="bui-btn bui-box-vertical bui-box-align-center span1" href="/MyApp/YaoDaoApp/App/Booknav/VipBook">
                        <div class="span1"><img src="/MyApp/YaoDaoApp/Public/images/icon-png/icon-vip.png"> </div>
                        <div class="span1">VIP</div>
                    </div>
                    <div class="bui-btn bui-box-vertical bui-box-align-center span1" href="/MyApp/YaoDaoApp/App/Booknav/AssignBook">
                        <div class="span1"><img src="/MyApp/YaoDaoApp/Public/images/icon-png/icon-qiaodao.png"> </div>
                        <div class="span1">签到</div>
                    </div>
                </li>
                <li class="bui-list-pic">
                    <div class="bui-box-align-justify">
                        <div class="span1">
                            <div class="big-title bui-btn bui-box-align-left" style="border:none;">热门畅销</div>
                        </div>
                        <div class="span1">
                            <div class="bui-btn span1 bui-box-align-right" style="border:none;">
                                <span class="small">查看更多</span>
                                <a><i class="icon-listright"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="bui-btn bui-box-space container-full">
                        <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hotBook): $mod = ($i % 2 );++$i;?><div class="span1">
                            <div class="bui-pic bui-btn" style="padding:0px;border:none;">
                                <div class="bui-thumbnail bui-sub <?php echo ($hotBook["bookmarkcolor"]); ?>" data-sub="<?php echo ($hotBook["bookmark"]); ?>">
                                    <img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($hotBook["image"]); ?>" alt=""></div>
                                <p class="bui-pic-text"><?php echo ($hotBook["bname"]); ?></p>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                </li>
            </ul>
        </div>
        <!--新品发售-->
        <ul class="bui-list-pic" style="margin-top:3%">
            <li class="bui-list">
                <div class="bui-box-align-justify">
                    <div class="span1">
                        <div class="big-title bui-btn bui-box-align-left" style="border:none;">新品发售</div>
                    </div>
                    <div class="span1">
                        <div class="bui-btn span1 bui-box-align-right" style="border:none;">查看更多
                            <a><i class="icon-listright"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="bui-btn bui-box-space container-full">
                    <?php if(is_array($new)): $i = 0; $__LIST__ = $new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newBook): $mod = ($i % 2 );++$i;?><div class="span1">
                            <div class="bui-pic bui-btn" style="padding:0px;border:none;">
                                <div class="bui-thumbnail bui-sub <?php echo ($newBook["bookmarkcolor"]); ?>" data-sub="<?php echo ($newBook["bookmark"]); ?>">
                                    <img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($newBook["image"]); ?>" alt=""></div>
                                <p class="bui-pic-text"><?php echo ($newBook["bname"]); ?></p>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </li>
        </ul>
        <!--经典阅读-->
        <ul class="bui-list-pic" style="margin-top:3%">
            <li class="bui-list">
                <div class="bui-box-align-justify">
                    <div class="span1">
                        <div class="big-title bui-btn bui-box-align-left" style="border:none;">经典阅读</div>
                    </div>
                    <div class="span1">
                        <div class="bui-btn span1 bui-box-align-right" style="border:none;">查看更多
                            <a><i class="icon-listright"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="bui-btn bui-box-space container-full">
                    <?php if(is_array($jing)): $i = 0; $__LIST__ = $jing;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jingBook): $mod = ($i % 2 );++$i;?><div class="span1">
                            <div class="bui-pic bui-btn" style="padding:0px;border:none;">
                                <div class="bui-thumbnail bui-sub <?php echo ($jingBook["bookmarkcolor"]); ?>" data-sub="<?php echo ($jingBook["bookmark"]); ?>">
                                    <img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($jingBook["image"]); ?>" alt=""></div>
                                <p class="bui-pic-text"><?php echo ($jingBook["bname"]); ?></p>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </li>
        </ul>
        <!--限时免费-->
        <ul class="bui-list-pic" style="margin-top:3%">
            <li class="bui-list">
                <div class="bui-box-align-justify">
                    <div class="span1">
                        <div class="big-title bui-btn bui-box-align-left" style="border:none;">限时免费</div>
                    </div>
                    <div class="span1">
                        <div class="bui-btn span1 bui-box-align-right" style="border:none;">查看更多
                            <a><i class="icon-listright"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="bui-btn bui-box-space container-full">
                    <?php if(is_array($mian)): $i = 0; $__LIST__ = $mian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mianBook): $mod = ($i % 2 );++$i;?><div class="span1">
                            <div class="bui-pic bui-btn" style="padding:0px;border:none;">
                                <div class="bui-thumbnail bui-sub <?php echo ($mianBook["bookmarkcolor"]); ?>" data-sub="<?php echo ($mianBook["bookmark"]); ?>">
                                    <img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($mianBook["image"]); ?>" alt=""></div>
                                <p class="bui-pic-text"><?php echo ($mianBook["bname"]); ?></p>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </li>
        </ul>

    </main>
    <script src="/MyApp/YaoDaoApp/Public/js/zepto.js"></script>
    <script src="/MyApp/YaoDaoApp/Public/js/bui-1.5.2.js"></script>
    <script>
        bui.ready(function () {
            // 控件初始化
            var uiBtn = bui.btn({id:'#page',handle:'.bui-btn'}).load();
            //轮播图
            var uiSlide = bui.slide({
                id: "#slide",
                height: 380,
                autopage: true,
                autoplay:true,
                loop: true,
            })

            //通知
            // 通知
            var newsSlide = bui.slide({
                id:"#slideNote",
                height:100,
                autoplay: true,
                loop: true,
                zoom: true,
                direction: "y"
            })

        })
    </script>
</body>
</html>