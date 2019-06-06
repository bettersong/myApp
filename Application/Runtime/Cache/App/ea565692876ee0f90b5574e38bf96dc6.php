<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>妖刀商城</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/bui.css" />
</head>
<body>
    <div class="bui-page">
        <header class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">我的收藏</div>
            <div class="bui-bar-right">
                <!-- 右边按钮位置 -->
            </div>
        </header>
        <main>
            <div class="bui-scroll-main">
                <ul class="bui-list bui-list-thumbnail">
                    <li class="bui-btn-title">
                        共<?=count($data)?>件宝贝
                    </li>
                    <?php if($data!=[]): if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><li class="bui-btn bui-box-align-bottom">
                                <div class="span4  bui-thumbnail " ><img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($book["image"]); ?>" alt=""></div>
                                <div class="span3" style="margin-left:3%;">
                                    <div class="span12">
                                        <h3 class="item-title"><?php echo ($book["bname"]); ?></h3>
                                    </div>
                                    <div class=" bui-box-align-bottom span12" style="margin-top:40%;">
                                        <div class="span1 item-text">
                                <span class="span1" style="color:#FF6701;font-size: 18px">
                                    <i>￥</i><?php echo ($book["price"]); ?></span>
                                        </div>
                                        <span class="bui-btn round" style="padding:5px 10px;border-radius:30px;">找相似</span>
                                    </div>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php else: ?>
                        <li class="bui-btn">您还没有收藏哦，快去商城看看吧☺</li><?php endif; ?>

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
        })
    </script>
</body>
</html>