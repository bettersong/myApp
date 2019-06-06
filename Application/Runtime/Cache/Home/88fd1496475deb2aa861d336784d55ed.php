<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        *{margin:0;padding:0}
        table{margin:20px auto}
        .head{width:100%;height:60px;line-height:60px;}
        .h-mid{text-align:center}
        .h-login{float:right;margin-top:-40px;margin-right:20px;}
        .main{width:100%;}
        .main_top{width:80%;margin:10px auto;}
        .page{width:400px;margin:0px auto;float: right;}
        .bookname{height:20px}
        #seach{width:50px;height:25px;background:cornflowerblue;border:none;margin-left:10px;font-size:14px;vertical-align: middle;}
    </style>
</head>
<body>
<div class="head">
    <div class="h-mid">
        <h3>首页</h3>
    </div>
   <div class="h-login">
       <?php if(isset($_SESSION['username'])): ?>欢迎<?php echo ($_SESSION['username']); ?>
           <span><a href="/PHPlab/demo/Home/User/logout">退出</a> </span>
           <?php else: ?>
           <a href="/PHPlab/demo/Home/User/showlogin">登录</a>
           <a href="/PHPlab/demo/Home/User/showregist">注册</a><?php endif; ?>


   </div>
</div>
<div>
    <span id="test">AJAX测试</span>
</div>
<div class="main">
    <div class="main_top">
        <a href="/PHPlab/demo/Home/Book/showadd">添加</a>
        <form action="/PHPlab/demo/Home/Book/userselect" method="post">
        查询书籍：<input type="text" value="<?php echo ($bookname); ?>" class="bookname" name="bname">
            <button id="seach">搜索</button>
        </form>
    </div>
    <table width="800" border="1">
        <tr>
            <td>编号</td>
            <td>书名</td>
            <td>作者</td>
            <td>数量</td>
            <td>价格</td>
            <td>操作</td>
        </tr>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($book["bid"]); ?></td>
                <td><?php echo ($book["bname"]); ?></td>
                <td><?php echo ($book["author"]); ?></td>
                <td><?php echo ($book["collect_count"]); ?></td>
                <td><?php echo ($book["price"]); ?></td>
                <td><a href="/PHPlab/demo/Home/Book/showupdate?bid=<?php echo ($book["bid"]); ?>&author=<?php echo ($book["author"]); ?>&bname=<?php echo ($book["bname"]); ?>&price=<?php echo ($book["price"]); ?>&collect_count=<?php echo ($book["collect_count"]); ?>">修改</a>/<a href="/PHPlab/demo/Home/Book/delete?bid=<?php echo ($book["bid"]); ?>"> 删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </table>
    <div class="page">
        <?php echo ($page); ?>
    </div>
    </div>
</div>
<script src="/PHPlab/demo/public/js/jquery.js"></script>
<script>
    console.log('/PHPlab/demo/index.php');
    console.log('/PHPlab/demo');
    console.log('/PHPlab/demo/Home/Book/showupdate?');
    $('#test').on('click',function(){

        var bid = 2;
        $.ajax({
            async:false,
            type: "post",
            data: {
                "bid":bid,
            },
            dataType: 'json',
            url: "/PHPlab/demo/Home/Book/test",
            success: function (msg) {
                alert(msg[0]['author']);
                console.log(msg);
            },
            error: function (msg) {
                alert(msg.status + "服务繁忙，请刷新或稍后再试。");
            }
        });
    })
</script>

</body>
</html>