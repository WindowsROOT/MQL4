
<?php
$active_menu = 1;
require 'head.php';
?>

<!-- /Header -->
<!-- Main -->
<style>
    .blink_me {
        animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }
</style>
<div id="main-wrapper" style="min-height: 600px;">
    <div class="row text-center blink_me" >
        <a href="stepbystep.docx" >
            <h3 style="font-weight: bold;color: green;">ดาวน์โหลดวิธีใช้งานโดยละเอียด >> คลิ๊ก <<</h3>
        </a>
    </div>
    <div class="row">
        <div class="col-md-12 text-center" style="margin-top: 20px;">
            <div class="img-thumbnail" >
                <img src="/img/howtouse.jpg">
            </div>
        </div>
    </div>


</div>
</div>
</div>

</body>
<?php require './footer.php'; ?>
</html>
<!--<div >
    <div class="row">
        <div class="col-md-12 text-center" style="margin-top: 20px;">
            <div class="img-thumbnail" >
                <img src="https://www.officemate.co.th/Activity/newfaeture/images/process/flow-app.jpg">
            </div>
        </div>
    </div>
    <div class="modal fade in" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"  >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                 Begin # DIV Form 
                <div id="div-forms">
                     Begin # Login Form 
                    <form id="login-form" action="c_check_login.php" method="post">
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">กรุณากรอก Username และ Password เพื่อเข้าใช้งานระบบ</span>
                            </div>
                            <input id="login_username" name="username1" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required="">
                            <input id="login_password" name="password1" class="form-control" type="password" placeholder="Password" required="">
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>
                        </div>
                    </form>
                     End # Login Form 
                </div>
                 End # DIV Form 
            </div>
        </div>
    </div>
</div>
</div>
</body> -->
