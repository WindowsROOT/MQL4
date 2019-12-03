<?php

if (isset($_GET)) {
    session_start();
    $Ea_name = $_GET['ea_select'];
    $ftp_server = '192.185.4.160';
    $conn_id = ftp_connect($ftp_server);
    $ftp_user_name = 'vertical@doujin69-th.com';
    $ftp_user_pass = 'y4nlfwtkCz#H';
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
    $contents = ftp_nlist($conn_id, ".");

    if (is_array($contents) || is_object($contents)) {
        foreach ($contents as $row) {
            if (isset($row[10])) {
                if ($_SESSION["user"] == round($row[10] . $row[11] . $row[12])) {
                    $temp = explode('_', $row);
                    $name = $temp[1];
                    if ($name == $Ea_name) {
                        ftp_delete($conn_id, $row);
                    }
                }
            }
        }
    }
    ftp_close($conn_id);
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo "<script type='text/javascript'>alert('ลบ EA สำเร็จ');window.location='user.php';</script>";
}
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
echo "<script type='text/javascript'>alert('กรุณาเลือก EA ที่ต้องการลบ');window.location='user.php';</script>";
