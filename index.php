<?php
include('config.php');

$sql = "select * from page order by pid desc limit 0,10";
$result = $db->query($sql);

$blog = array();
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $blogs[] = $row;
}


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
                <?php foreach ($blogs as $blog): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="read.php?pid=<?php echo $blog['pid']; ?>"><?php echo $blog['title']; ?></a>
                    </div>
                    <div class="panel-body">
                        <?php echo mb_substr(strip_tags($blog['content']),0,80); ?>...
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </body>
</html>
