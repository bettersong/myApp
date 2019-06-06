<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        table{margin:20px auto}
    </style>
</head>
<body>
<table width="800" border="1">
    <tr>
        <td>编号</td>
        <td>书名</td>
        <td>数量</td>
        <td>价格</td>
        <td>作者</td>
        <td>操作</td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($book["bid"]); ?></td>
            <td><?php echo ($book["bname"]); ?></td>
            <td><?php echo ($book["collect_count"]); ?></td>
            <td><?php echo ($book["price"]); ?></td>
            <td><?php echo ($book["author"]); ?></td>
            <td><a href="showupdate?bid=<?php echo ($book["bid"]); ?>&author=<?php echo ($book["author"]); ?>&bname=<?php echo ($book["bname"]); ?>&price=<?php echo ($book["price"]); ?>&collect_count=<?php echo ($book["collect_count"]); ?>">修改</a>/<a href="delete.html"> 删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
</body>
</html>