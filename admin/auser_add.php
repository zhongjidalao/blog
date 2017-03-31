<?php
include("check.php");

$aid = $input->get('aid');

$auser = array(
    'auser' => '',
    'apass' => '',
);

if($aid>0){
    $sql = "select * from admin where aid=$aid";
    $res = $db->query($sql);
    $auser = $res->fetch_array(MYSQLI_ASSOC);
}

if($input->get('do') == 'add'){
    $auser = $input->post('auser');
    $apass = $input->post('apass');
    if(empty($auser) || empty($apass)){
        die("帐号或密码不能为空");
    }

    $sql = "select * from admin where auser=$auser and aid <> $aid";
    $res = $db->query($sql);
//    if($res->fetch_array()){
//        die('帐号密码不能重复');
//    }

    if($aid<1) {
        $sql = "insert into admin (auser,apass) values ('{$auser}','{$apass}')";
    }else{
        $sql = "UPDATE admin SET auser='{$auser}',apass='{$apass}' where aid='{$aid}'";
    }
    $is = $db->query($sql);
    if($is){
        header("location:auser.php");
    }else{
        die("添加失败");
    }
}
?>
<html>
<head>
    <title>添加管理员</title>
    <?php include(PATH . '/header.inc.php') ?>
</head>
<body>
<?php include('nav.inc.php'); ?>
<div class="container">
    <h1>添加管理员 <small class="pull-right"><a class="btn btn-default" href="auser.php">返回</a> </small></h1>
    <hr/>
    <div class="rows">
        <form class="form-horizontal" action="auser_add.php?do=add&aid=<?php echo $aid; ?>" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">帐号</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="auser" placeholder="请输入帐号" value = '<?php echo $auser['auser'] ?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="apass" placeholder="请输入密码" value = '<?php echo $auser['apass'] ?>'>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-default">确定</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>