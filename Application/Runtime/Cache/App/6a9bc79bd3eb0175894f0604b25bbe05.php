<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>商城</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/bui.css" />
    <style>
        .mineImg{width:100px;height:100px;}
        .bui-dropdown>.active {background: #39a4ff !important;}
    </style>
</head>
<body>

<div class="bui-page">
    <header class="bui-bar bui-bar-center">
        <div class="bui-bar-left">

        </div>
        <div class="bui-bar-main">
        购物车
        </div>
        <div class="bui-bar-right"></div>

    </header>

    <main>
        <div class="bui-scroll-main">
        <ul class="bui-list bui-list-thumbnail">
            <li class="bui-btn-title">
                共<?=count($data)?>件宝贝
            </li>
            <?php if($data!=[]): if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$myBook): $mod = ($i % 2 );++$i;?><li class="bui-btn bui-box">
                        <div class="span1"><input type="checkbox" class="bui-choose" value="" text="" checked="checked"></div>
                        <div class="span4 bui-thumbnail " ><img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($myBook["image"]); ?>" alt=""></div>
                        <div class="span3" style="margin-left:3%;">
                            <h3 class="item-title"><?php echo ($myBook["bname"]); ?></h3>
                            <p class="item-text">
                                <span class="span1" style="color:#f81c11;">妖刀无忧购</span>
                            </p>
                            <p class="item-text">
                                <span class="span1" style="color:#FF6701"><i>￥</i><?php echo ($myBook["price"]); ?></span>
                            </p>
                        </div>
                        <span class="price">
				         <div><div class="bui-number" id="<?php echo ($myBook["bid"]); ?>" ></div></div>
                        </span>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                <li class="bui-btn">购物车空空如也，快去商城看看吧☺</li><?php endif; ?>

        </ul>
        </div>
    </main>

<footer >
    <div class="bui-box">
        <div class="span1">5</div>
        <div class="span1">6</div>
    </div>
</footer>
</div>


<script src="/MyApp/YaoDaoApp/Public/js/zepto.js"></script>
<script src="/MyApp/YaoDaoApp/Public/js/bui-1.5.2.js"></script>
<script>
    bui.ready(function () {
        // 控件初始化
        //动态创建
        var num = $('.bui-number').attr("id");
        var uiNumber = bui.number();
        //uiNumber.value(num);
        //静态态绑定
        var uiSelectCustom2 = bui.select({
            id: "#selectCustom2",
            popup: false,
            type: "checkbox",
            onChange: function(e) {
               console.log(e.target);
            }
        });
    })
</script>
</body>
</html>