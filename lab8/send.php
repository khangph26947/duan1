<!-- <?php 

include "model/PHPMailer-master/src/PHPMailer.php";
include "model/PHPMailer-master/src/Exception.php";
//  include "model/PHPMailer-master/src/POP3.php";
 include "model/PHPMailer-master/src/SMTP.php";

// use PHPMailer\P;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
// print_r($mail);
try {
    // Server settings
    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';
    $mail->SMTPDebug = 2;                                 // bật tính năng gửi success or faild thì vẫn show thông tin mail để ta cấu hình
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'phamngockhanh29703@gmail.com';                 // SMTP username
    $mail->Password = 'gcykqtleorouyifc';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('phamngockhanh29703@gmail.com', 'shop thời trang');
    $mail->addAddress('duckhangnguyen842003@gmail.com', 'khang');           // Name is optional
    // $mail->addCC('phamngockhanh29703@gmail.com');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Bạn muốn đặt lại mật khẩu?';

    $body = 'new content';
    // $body .= '<p>Xin chào,</p>' ;
   
   
    // $body .= '<p>Nếu bạn đã yêu cầu đặt lại mật khẩu, hãy ấn vào <a href="change_passowrd.php"><h3 style="color: green;">tại đây</h3></a> để tạo mật khẩu mới để vào tài khoản XOSS Shop của bạn.</p>';
    // $body .= '<p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>';
    // $body .= 'Nếu bạn gặp phải bất cứ vấn đề nào khi đăng nhập vào tài khoản XOSS Shop, vui lòng gửi mail đến địa chỉ: hungdang02042003@gmail.com</pre>';
    $body .= '<p>Trân trọng.</p>';

    // $mail->Body    = 'Mat khau moi cua ban la: ' . $forget_password;
    $mail->Body = $body;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}   
?> -->