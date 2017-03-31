<?php
include('check.php');

if($input->get('do') == 'delete'){
    $aid = $input->get('aid');
    if($aid == $session_aid){
        die("不能删除自己");
    }
    $sql = "delete from admin where aid = $aid";
    $is = $db->query($sql);
    if($is){
        header("location:auser.php");
    }else{
        die("删除失败");
    }
}

$sql = "select * from admin";
$result = $db->query($sql);
$rows = array();
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}
?>
<html>
<head>
    <title>管理员管理</title>
    <?php include(PATH . '/header.inc.php') ?>
</head>
<body>
    <?php include('nav.inc.php'); ?>
    <div class="container">
        <h1>管理员管理 <small class="pull-right"><a class="btn btn-default" href="auser_add.php">添加管理员</a> </small></h1>
        <hr/>
        <div class="rows">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>管理</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo $row['aid']; ?></td>
                        <td><?php echo $row['auser']; ?></td>
                        <td>
                            <a href="auser_add.php?aid=<?php echo $row['aid']; ?>">修改</a>
                            <a href="auser.php?do=delete&aid=<?php echo $row['aid']; ?>">删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>