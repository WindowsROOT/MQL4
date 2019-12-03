<?php
require './db_con.php';
if (isset($_POST['ac_username'])) {
    $captcha_post = $_POST['g-recaptcha-response'];
    $captchaSecretCode = '6LfVEEEUAAAAAJD4npT4PTa5JAnuyyNO2U1YarZ0';
    $recaptcha = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $captchaSecretCode . "&response=" . $captcha_post . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);
    if ($recaptcha['success'] == TRUE) {
        $username = $_POST['ac_username'];
        $pass = md5($_POST['ac_password']);
        $fullname = $_POST['fullname'];
        $nickname = $_POST['nickname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $user_modify = date('Y-m-d H:i:s');
        // --
        $sql = "SELECT * FROM ac_user WHERE ac_username='$username' or email = '$email'";
        $result = $conn->query($sql);

        $flag = 0;
        $i = 0;
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $i++;
        }
        // --
        if ($i == 0) {
            $sql_insert = "INSERT INTO ac_user (ac_username,ac_password,fullname,nickname,email,phone,user_modify,admin_type) " .
                    " VALUES ('{$username}','{$pass}','{$fullname}' , '{$nickname}' , '{$email}' , '{$phone}' , '{$user_modify}' , 0 ) ;";
            $ret = $conn->query($sql_insert);
            // send mail
            $bb = file_get_contents('http://www.fxcodegeneratedea.com/test_mail.php?email=' . $email);
            //
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<script type='text/javascript'>alert('สมัครสำเร็จ');window.location='index.html';</script>";
        } else {
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<script type='text/javascript'>alert('username หรือ email ซ้ำ');window.location='register.php';</script>";
        }
    } else {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        echo "<script type='text/javascript'>alert('กรุณา ฉันไม่ไช่โปรแกรมอัตโนมัติ');window.location='register.php';</script>";
    }
}
$active_menu = 2;
require './head.php';
?>
<!-- /Header -->
<!-- Main -->
<div id="main-wrapper" style="min-height: 600px;">

    <div class="row">
        <div class="col-md-12 text-center" style="margin-top: 20px;">
            <form class="form-horizontal" action="./register.php" method="post" autocomplete="false" id="form_add">
                <div class="form-group">
                    <label class="control-label col-md-3">username</label>
                    <div class="col-md-6">
                        <input name="ac_username" class="form-control" required="" minlength=8>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">password</label>
                    <div class="col-md-6">
                        <input name="ac_password" type="password" class="form-control" minlength="8" id="ac_password" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">ชื่อ นามสกุล</label>
                    <div class="col-md-6">
                        <input name="fullname" class="form-control" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">ชื่อเล่น</label>
                    <div class="col-md-6">
                        <input name="nickname" class="form-control" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">อีเมล</label>
                    <div class="col-md-6">
                        <input name="email" class="form-control" type="email" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">เบอร์โทรศัพท์</label>
                    <div class="col-md-6">
                        <input name="phone" type="number" class="form-control" required="">
                    </div>
                </div>
                <div class="form-group">
                    <center>
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                        <div class="g-recaptcha" data-sitekey="6LfVEEEUAAAAADbP37PDGdN8Fnb2Ah1wUuypwP3R"></div>    
                    </center>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary btn-sm" type="submit">บันทึก</button>
                    <a class="btn btn-primary btn-sm" href="index.html">กลับ</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $('#form_add').submit(function (event) {
        var input = $('#ac_password');
        var text = $(input).val();
        var regex = /^[0-9a-zA-Z]{8,20}$/;
        if (text.length > 0) {
            if (text.length >= 8 && text.length <= 20) {
                if (regex.test(text) == false) {
                    $(input).val('');
                    alert('กรุณากรอกเป็นภาษาอังกฤษและตัวเลข');
                    $(input).focus();
                    event.preventDefault();
                }
            } else {
                alert('กรุณากรอกรหัสผ่านอย่างน้อย 8 ถึง 20 ตัวอักษร');
                $(input).focus();
                event.preventDefault();
            }
        }
    });
    function check_username_format(input) {
        var text = $(input).val();
        var regex = /^[0-9a-zA-Z]{8,20}$/;
        if (text.length > 0) {
            if (text.length >= 8 && text.length <= 20) {
                if (regex.test(text) == false) {
                    $(input).val('');
                    alert('กรุณากรอกเป็นภาษาอังกฤษและตัวเลข');
                    $(input).focus();
                }
            } else {
                alert('กรุณากรอกรหัสผ่านอย่างน้อย 8 ถึง 20 ตัวอักษร');
                $(input).focus();
            }
        }
    }
</script>
</body>
<?php require './footer.php'; ?>
</html>

