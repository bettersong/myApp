<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>添加书籍</h3>
<form action="addbook" method="post">
    书名：<input type="text" value="" name="bname"><p></p>
    作者：<input type="text" value="" name="author"><p></p>
    数量：<input type="text" value="" name="collect_count"><p></p>
    价格：<input type="price" value="" name="price"><p></p>
    <button>提交</button>
</form>
</body>
</html>