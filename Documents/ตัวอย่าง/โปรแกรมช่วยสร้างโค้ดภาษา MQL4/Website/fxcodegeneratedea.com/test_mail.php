<?php

function sendMail($mailto, $mailform, $subject, $message) {
    $msg = '<html><style>';
    $msg .= ' body{font-size:8pt;font-family:Tahoma;color:#666666;}';
    $msg .= ' a:link{color:maroon;text-decoration: none;}';
    $msg .= ' a:visited{color:maroon;text-decoration: none;}';
    $msg .= ' a:hover{color:#526AF9;text-decoration: none;}';
    $msg .= "</style><body>$message</body></html>";

    $head = "MIME-Version: 1.0\n";
    $head .= "Content-type: text/html; charset=TIS-620\n";
    $head .= "From: $mailform\n";
    $head .= "Reply-to: $mailform\n";
    $head .= "X-Priority: 3\n";
    $head .= "X-Mailer: PHP mailer\n";
    return mail($mailto, $subject, $msg, $head);
}

//sendMail('qwaszx.za@gmail.com', 'qwaszx_za@hotmail.com', 'ทดสอบ', 'Ea มึงติดลบนะครัช');
$mail = urldecode($_GET['email']);
$headers = 'From: bot@fxcodegeneratedea.com' . " " .
        'X-Mailer: PHP/' . phpversion();
$message = 'ยินดีต้อนรับเข้าสู่เว็บไซต์ http://www.fxcodegeneratedea.com ขอให้สนุกกับการเทรด';
$msg = '<html><style>';
$msg .= ' body{font-size:8pt;font-family:Tahoma;color:#666666;}';
$msg .= ' a:link{color:maroon;text-decoration: none;}';
$msg .= ' a:visited{color:maroon;text-decoration: none;}';
$msg .= ' a:hover{color:#526AF9;text-decoration: none;}';
$msg .= "</style><body>$message</body></html>";
mail($mail, 'ยินดีต้อนรับสมาชิกใหม่', $message, $headers);
