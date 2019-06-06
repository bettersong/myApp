<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>妖刀商城</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/MyApp/YaoDaoApp/Public/css/bui.css" />
    <style>
        .shopcar{border-radius: 20px 0 0 20px}
        .shopbuy{border-radius: 0 20px 20px 0}
        .active{color:red}
    </style>
</head>
<body>

<div class="bui-page">
    <header class="bui-bar">
        <div class="bui-bar-left">
            <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
        </div>
        <div class="bui-bar-main">商品详情</div>
        <div class="bui-bar-right">
            <!-- 右边按钮位置 -->
        </div>
    </header>
    <main>
        <div class="bui-list-pic">
            <div class="span1">
                <div class="bui-pic bui-sub <?php echo ($data[0]["bookmarkcolor"]); ?>" data-sub="<?php echo ($data[0]["bookmark"]); ?>">
                    <div class="bui-pic-img"><img src="/MyApp/YaoDaoApp/Public/images/<?php echo ($data[0]["image"]); ?>" alt="" ></div>
                    <div class="bui-pic-title bui-box danger">
                        <div class="span1"> ￥<span style="font-size:18px;"><?php echo ($data[0]["price"]); ?></span></div>
                        <div class="span1 bui-fluid-2">
                            <div></div>
                            <div>已售<?php echo ($data[0]["salecount"]); ?>本</div>
                        </div>
                    </div>
                </div>
                <div style="background: #fff;margin-top:-10px">
                    <div class="bui-pic-title bui-box">
                        <div class="span4">
                            <span class="danger round">妖刀</span>
                            <p class="bui-pic-text"><?php echo ($data[0]["bname"]); ?></p>
                        </div>
                        <div class="span1" style="text-align: right">
                            <div class="bui-icon ">
                                <div id="btnOpen"><i class="icon-share span1" style="color:#ccc"></i></div>

                            </div>
                        </div>
                    </div>
                    <div class="bui-box-align-center" style="margin-top:-10px;">
                        <div class="span1">
                            <div class="bui-icon">
                                <i class="icon-attention_fill warning small">&#xe67f;</i>

                            </div>
                            <span>123人浏览过</span>
                        </div>
                        <div class="span1">
                            <div class="bui-icon">
                                <i class="icon-friend_fill warning small">&#xe675;</i>
                            </div>
                            <span>帮我选</span>
                        </div>
                    </div>
            </div>
            </div>
        </div>
        <div class="section-title"></div>
        <ul class="bui-list">
            <li class="bui-box bui-btn bui-nav-icon">
                <div class="span3">
                    发货
                    <img src="/MyApp/YaoDaoApp/Public/images/location.png">
                    <span>广东广州</span>
                    <span>|</span>
                </div>

                <div class="span3">快递：免运费</div>
                <div class="span2" style="text-align: right">月销<?php echo ($data[0]["salecount"]); ?>笔</div>
            </li>
            <div class="section-title"></div>
            <li class="bui-box bui-btn bui-nav-icon">
                <div class="span1">
                    <span>服务</span>
                    <span>15天退货</span>
                    <span>‧</span>
                    <span>运费险</span>
                    <span>‧</span>
                    <span>公益宝贝</span>
                </div>
                <i class="icon-listright"></i>
            </li>
            <li class="bui-box bui-btn bui-nav-icon">
                <div class="span1">规格</div>
                <i class="icon-listright"></i>
            </li>
            <li class="bui-box bui-btn bui-nav-icon">
                <div class="span1">参数</div>
                <i class="icon-listright"></i>
            </li>
            <li class="section-title"></li>

        </ul>


    </main>
    <footer>
        <div class="bui-box">
            <div class="span1 bui-btn bui-box-vertical">
                <i class="icon-home"></i><div class="span1">店铺</div>
            </div>
            <div class="span1 bui-btn bui-box-vertical">
                <i class="icon-people">&#xe67b;</i><div class="span1">客服</div>
            </div>
            <div class="span1 bui-btn bui-box-vertical" id="shoucang" bid="<?php echo ($data[0]["bid"]); ?>">
                <i class="icon-喜欢">&#xe641;</i>

                <div class="span1">收藏</div>
            </div>
            <div class="span4 bui-btn">
                <div class="bui-box-align-middle">
                    <div class="span1 bui-btn container-xy shopcar warning" id="shopCar" bid="<?php echo ($data[0]["bid"]); ?>">
                        <div id="btnOpen1"><i class="icon-购物车">&#xe631;</i>加入购物车</div>
                    </div>
                <!--<div class="span1 bui-btn shopcar warning">加入购物车</div>-->
                <div class="span1 bui-btn shopbuy danger container-xy">
                    立即购买
                </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="/MyApp/YaoDaoApp/Public/js/zepto.js"></script>
<script src="/MyApp/YaoDaoApp/Public/js/bui.js"></script>
<script>
    bui.ready(function(){
        var uiActionsheet = bui.actionsheet({
            trigger: "#btnOpen",
            buttons: [
                { name:"分享到微博",value:"weibo" },
                { name:"分享到微信",value:"weixin" },
                { name:"分享到QQ",value:"QQ" }],
            callback: function(e){
                var val = $(e.target).attr("value");
                console.log(val);
                if( val == "cancel"){
                    this.hide();
                }
            }
        });
        $("#shoucang").on('click',function(){
            var bid = $(this).attr('bid');
            //console.log("shoucamg");
            if($(this).find('i').hasClass('active')){
                console.log(55);
                $(this).find('i').removeClass('active');
                $.ajax({
                    url:'/MyApp/YaoDaoApp/App/Book/bookcollectcancle',
                    type:'post',
                    data:{
                        'bid':bid,
                    },
                    success:function (msg) {
                        console.log(msg);
                        if(msg!=''){
                            bui.hint({content:"<i class='icon-check'></i><br />取消收藏", position:"center" , effect:"fadeInDown"});
                        }
                    },
                    error:function (msg) {
                        console.log(msg);
                    }
                })

            }else{
                $(this).find('i').addClass('active');
                $.ajax({
                    url:'/MyApp/YaoDaoApp/App/Book/bookcollect',
                    type:'post',
                    data:{
                        'bid':bid,
                    },
                    success:function (msg) {
                        console.log(msg);
                        if(msg==1){
                            bui.hint({content:"<i class='icon-check'></i><br />收藏成功", position:"center" , effect:"fadeInDown"});
                        }
                    },
                    error:function (msg) {
                        console.log(msg);
                    }
                })

            }

        });
        $('#shopCar').on('click',function () {
            var bid = $(this).attr('bid');
            console.log(bid);
            $.ajax({
                url:'/MyApp/YaoDaoApp/App/Book/ShopCar',
                type:'post',
                data:{
                    'bid':bid,
                },
                dataType:'json',
                success:function (msg) {
                   if(msg==1){
                       bui.hint({
                           content:"<i class='icon-check'></i><br />添加成功",
                           position:"center" ,
                           effect:"fadeInDown"
                       });
                   }
                },
                error:function (msg) {
                    console.log(msg);

                }
            })

        })
    })

</script>
</body>
</html>