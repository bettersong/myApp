<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>用户登录</h2>
<h4><?php echo ($msg); ?></h4>
<form action="setlogin" method="post">
    账号：<input type="text" name="username"><p></p>
    密码：<input type="password" name="password"><p></p>
    <button>登录</button>
</form>
</body>
</html>