<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <div class="title">
        <h3>修改数据</h3>

    </div>
    <div class="myBox">
        <form action="updatebook" method="post" class="myForm">
            序&nbsp;&nbsp;&nbsp;号：<input type="text" name="bid" value="<?php echo ($book->bid); ?>" readonly><p></p>
            作&nbsp;&nbsp;&nbsp;者：<input type="text" name="author" value="<?php echo ($book->author); ?>"><p></p>
            书&nbsp;&nbsp;&nbsp;名：<input type="text" name="bname" value="<?php echo ($book->bname); ?>"><p></p>
            价&nbsp;&nbsp;&nbsp;格：<input type="text" name="price" value="<?php echo ($book->price); ?>"><p></p>
            数&nbsp;&nbsp;&nbsp;量：<input type="text" name="collect_count" value="<?php echo ($book->collect_count); ?>"><p></p>
            <button>提交</button>
        </form>
    </div>

</body>
</html>