<?php
$active_menu = 1;
require './head_user.php';
require './db_con.php';
$user_id = $_SESSION['user'];

if (isset($_POST['ac_username'])) {
//    $fullname = $_POST['fullname'];
//    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_modify = date('Y-m-d H:i:s');


    $sql_insert = "UPDATE ac_user SET email = '{$email}',phone = '{$phone}',user_modify = '{$user_modify}' " .
            " WHERE ac_user.user_id = '{$user_id}';";
    $ret = $conn->query($sql_insert);
}

$sql = "SELECT * FROM ac_user where user_id = {$user_id}";
$ret = $conn->query($sql);
$row = $ret->fetchArray(SQLITE3_ASSOC);
//while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
//    echo "<pre>";
//    print_r($row);
//    echo "</pre>";
//}
?>
<div class="form-horizontal" >
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-8">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="control-label col-md-3">username</label>
                    <div class="col-md-6">
                        <input name="ac_username" class="form-control" readonly="" value="<?= $row['ac_username'] ?>">
                    </div>
                    <label class="control-label col-md-3">EA ของฉัน</label>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">ชื่อ นามสกุล</label>
                    <div class="col-md-6">
                        <input name="fullname" class="form-control" value="<?= $row['fullname'] ?>" disabled="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">ชื่อเล่น</label>
                    <div class="col-md-6">
                        <input name="nickname" class="form-control" value="<?= $row['nickname'] ?>" disabled="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">อีเมล</label>
                    <div class="col-md-6">
                        <input name="email" class="form-control" value="<?= $row['email'] ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">เบอร์โทร</label>
                    <div class="col-md-6">
                        <input name="phone" class="form-control" value="<?= $row['phone'] ?>" required="">
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary btn-sm" type="submit">บันทึก</button>
                </div>
            </form>
        </div>
        <?php
        $ftp_server = 'gator4148.hostgator.com';
        $conn_id = ftp_connect($ftp_server);
        $ftp_user_name = 'vertical@doujin69-th.com';
        $ftp_user_pass = 'y4nlfwtkCz#H';
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

        $contents = ftp_nlist($conn_id, "/");
//        $contents = ftp_rawlist($conn_id, ".");
//        echo "Current directory is now: " . ftp_pwd($conn_id) . "</br>";

        $ea_name = [];
//        var_dump($login_result);
//        var_dump($contents);
//        echo 'Current PHP version: ' . phpversion();
        if (is_array($contents) || is_object($contents)) {
            foreach ($contents as $row) {
                if (isset($row[10])) {
                    if ($_SESSION["user"] == round($row[10] . $row[11] . $row[12])) {
//                        echo $row . ' ';
                        $temp = explode('_', $row);
//                        echo $temp[1] . ' ';
                        $date = explode('.', $temp[2]);
//                        echo $date[0] . '<br>';
                        if (!in_array($temp[1], $ea_name)) {
                            $ea_name[] = $temp[1];
                        }
                    }
                }
            }
        }
        ftp_close($conn_id);
        ?>
        <form action="graph.php" method="post" >
            <div class="col-md-2">
                <select class="form-control" id="ea_select" name="ea_select">
                    <?php
                    foreach ($ea_name as $row) {
                        ?>
                        <option value="<?= $row ?>"><?= $row ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-2">

                <button class="btn btn-primary" type="submit">เรียกดู</button>
                <button class="btn btn-danger" type="button" onclick="window.location = 'del_ea.php?ea_select=' + $('#ea_select').val();">ลบ</button>
            </div>
        </form>
    </div>
</div>
<?php require './footer.php'; ?>