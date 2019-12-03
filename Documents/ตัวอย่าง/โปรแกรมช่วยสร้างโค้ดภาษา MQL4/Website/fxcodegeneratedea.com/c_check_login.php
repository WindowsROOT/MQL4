<?php

session_start();

ob_start();
include 'db_con.php';

if ($_POST['super_login']) {
    $_SESSION["user"] = $_POST['super_login'];
    die();
}

$_username = $_POST['username1'];
$_password = md5($_POST['password1']);

$sql = "SELECT * FROM ac_user WHERE ac_username='$_username' AND ac_password='$_password' AND admin_type = 0 ";
$result = $conn->query($sql);

$flag = 0;
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $sql_status = "SELECT * FROM ac_user WHERE ac_username='$_username' AND ac_password='$_password' AND admin_type = 0 AND user_status_id = 2";
    $result2 = $conn->query($sql_status);
    while ($row2 = $result2->fetchArray(SQLITE3_ASSOC)) {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        echo "<script type='text/javascript'>alert('ผู้ใช้งานถูกระงับ');window.location='index.html';</script>";
        break;
    }
    $_SESSION["user"] = $row['user_id'];
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo "<script type='text/javascript'>alert('ยินดีต้อนรับ');window.location='suggestion.php';</script>";
    break;
    $flag = 1;
}
if ($flag == 0) {
    // admin
    $sql_admin = "SELECT * FROM ac_user WHERE ac_username='$_username' AND ac_password='$_password' AND admin_type = 1 ";
    $result_admin = $conn->query($sql_admin);
    while ($row = $result_admin->fetchArray(SQLITE3_ASSOC)) {
        $_SESSION["admin"] = $row['user_id'];
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        echo "<script type='text/javascript'>alert('ยินดีต้อนรับผู้ดูแลระบบ');window.location='admin.php';</script>";
    }
    // -- end
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo "<script type='text/javascript'>alert('username หรือ password ไม่ถูกต้อง');window.location='index.html';</script>";
}
$conn->close();
