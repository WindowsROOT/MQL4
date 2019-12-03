<?php
$active_menu = 2;
require './head_admin.php';
require './db_con.php';
$user_id = $_SESSION['admin'];
if (isset($_POST['ac_username'])) {
//    $fullname = $_POST['fullname'];
//    $nickname = $_POST['nickname'];

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_status_id = $_POST['user_status_id'];
    $user_modify = date('Y-m-d H:i:s');
    $user_id_update = $_POST['user_id'];
    if ($_POST['ac_password'] != '') {
        $ac_password = md5($_POST['ac_password']);
        $text_password = " ac_password = '{$ac_password}' ,";
    }

    $sql_insert = "UPDATE ac_user SET {$text_password} email = '{$email}',phone = '{$phone}',user_modify = '{$user_modify}' , user_status_id = '{$user_status_id}' " .
            " WHERE ac_user.user_id = '{$user_id_update}';";
    $ret = $conn->query($sql_insert);
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo "<script type='text/javascript'>alert('บันทีกสำเร็จ');</script>";
}
$sql = "SELECT * FROM ac_user where admin_type=0";
$ret = $conn->query($sql);
$i = 0;
?>
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <a class="btn btn-sm btn-success" target="_blank" href="register.php">สมัครสมาชิก</a>
        </div>
    </div>
</div>
<?php
$ftp_server = 'gator4148.hostgator.com';
$conn_id = ftp_connect($ftp_server);
$ftp_user_name = 'vertical@doujin69-th.com';
$ftp_user_pass = 'y4nlfwtkCz#H';
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

$contents = ftp_nlist($conn_id, "/");

while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    $i++;
    $user_id = $row['user_id'];
    ?>
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" action="" method="post">
                <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
                <div class="form-group">
                    <label class="control-label col-md-3">username</label>
                    <div class="col-md-6">
                        <input name="ac_username" class="form-control" readonly="" value="<?= $row['ac_username'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">password</label>
                    <div class="col-md-6">
                        <input name="ac_password" type="text" class="form-control" placeholder="กรอกรหัสเพื่อ SET password ใหม่" id="password_<?= $i ?>" value="">
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" style="text-align: left" for="chk_<?= $i ?>">
                            <input type="hidden" id="chk_<?= $i ?>" onclick="myFunction('<?= $i ?>')">
                        </label>
                    </div>
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
                        <input name="email" class="form-control" value="<?= $row['email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">สถานะ</label>
                    <div class="col-md-6">
                        <select class="form-control" name="user_status_id">
                            <option value="1" <?= ($row['user_status_id'] == 1 ? 'selected' : '') ?>>ปกติ</option>
                            <option value="2" <?= ($row['user_status_id'] == 2 ? 'selected' : '') ?>>ระงับ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">เบอร์โทร</label>
                    <div class="col-md-4">
                        <input name="phone" class="form-control" value="<?= $row['phone'] ?>">
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-primary" type="submit">บันทึก</button>

                    </div>
                </div>
            </form>

            <form action="graph.php" method="post" target="_blank" class="form-horizontal">
                <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
                <input type="hidden" name="user_id__" value="<?= $row['user_id'] ?>">
                <?php
                $ea_name = [];
                if (is_array($contents) || is_object($contents)) {
                    foreach ($contents as $row_) {
                        if (isset($row_[10])) {
                            if ($row['user_id'] == round($row_[10] . $row_[11] . $row_[12])) {
                                $temp = explode('_', $row_);
                                $date = explode('.', $temp[2]);
                                if (!in_array($temp[1], $ea_name)) {
                                    $ea_name[] = $temp[1];
                                }
                            }
                        }
                    }
                }
                ?>
                <div class="form-group">
                    <label class="control-label col-md-3">ชื่อ EA ทั้งหมด</label>
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
                    <div class="col-md-5">
                        <button class="btn btn-warning" type="submit">เรียกดู</button>
                        <!--<a href="javascript:void(0);" onclick="login_backend('<?= @$user_id ?>')" class="btn btn-success" href="#">Super Login</a>-->
                        <!--<button class="btn btn-danger" type="button" onclick="window.location = 'del_ea.php?ea_select=' + $('#ea_select').val();">ลบ</button>-->
                    </div>
                </div>
            </form>
        </div>



    </div>
    <hr>

    <?php
}
ftp_close($conn_id);
?>
<?php require './footer.php'; ?>
<script>
    function openInNewTab(url) {
        var win = window.open(url, '_blank');
        win.focus();
    }
    function login_backend(user_id) {
        $.post('./c_check_login.php', {super_login: user_id}, function (result) {
            alert('login สำเร็จ');
            openInNewTab('http://www.fxcodegeneratedea.com/user.php');
        });
    }
    function myFunction(i) {
        var x = document.getElementById("password_" + i);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>