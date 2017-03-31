<?php
session_start();

include('../config.php');

/*
$sql = "select * from admin";
$mysqli_result = $mysqli->query($sql);

$row = $mysqli_result->fetch_array(MYSQLI_ASSOC);
*/

if($input->get('do') == 'check'){
    $auser = $input->post('auser');
    $apass = $input->post('apass');
    $sql = "select * from admin where auser='{$auser}' and apass='{$apass}'";
    $mysqli_result = $db->query($sql);
    $row = $mysqli_result->fetch_array(MYSQLI_ASSOC);

    if(is_array($row)){
        $_SESSION['aid'] = $row['aid'];
        header("location:home.php");
    }else {
        die("账号或密码错误");
    }
}
?>
<html>
    <head>
        <title>管路员登录</title>
        <?php include(PATH . '/header.inc.php') ?>
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-top: 200px;">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">管理员登录</div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="login.php?do=check" method="post">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">账号</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="auser" name="auser" placeholder="账号">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="apass" name="apass" placeholder="密码">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">登录</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer text-right">版权所有 侵权必究</div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </body>
</html>