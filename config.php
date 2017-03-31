<?php
define("PATH",dirname(__FILE__));

include(PATH . '/core/db.class.php');
$db = new db();

include(PATH . '/core/input.class.php');
$input = new input();

$sql = "select * from setting";
$set_result = $db->query($sql);
$setting = array();
while ($row = $set_result->fetch_array(MYSQLI_ASSOC)){
    $setting[$row['key']] = $row['val'];
}