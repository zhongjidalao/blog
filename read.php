<?php
include('config.php');

$pid = (int) $input->get('pid');
if($pid<1){
    die('无效文章');
}
$sql = "select * from page where pid='{$pid}'";
$blog = $db->query($sql)->fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $setting['title']; ?></title>
    <?php include(PATH . '/header.inc.php'); ?>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1><?php echo $setting['title']; ?></h1>
        <p><?php echo $setting['intro']; ?></p>
    </div>
    <ol class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li><a href="#">Library</a></li>
        <li class="active">Data</li>
    </ol>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">作者简介</div>
            <div class="panel-body">
                作者自己的简介
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Panel heading without title</div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>
    <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $blog['title']; ?>
                </div>
                <div class="panel-body">
                    <?php echo $blog['content'];?>
                </div>
            </div>
    </div>
</div>
</body>
</html>
