<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailHelper
{
    public static function sendVerifyEmail($email, $fullname, $token)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->isSMTP();
            $mail->Host = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['SMTP_USER'];
            $mail->Password = $_ENV['SMTP_PASS'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom($_ENV['SMTP_USER'], "Ludus");
            $mail->addAddress($email, $fullname);

            $verifyUrl = "http://127.0.0.1:8001/verify?token=$token";

            $mail->isHTML(true);
            $mail->Subject = "Xác thực tài khoản của bạn";

            $mail->Body = "
                <div style='font-family: Arial, sans-serif; padding: 20px;'>
                    <h2>Xin chào <b>$fullname</b>,</h2>

                    <p>Cảm ơn bạn đã đăng ký tài khoản! Vui lòng nhấn nút bên dưới để xác thực email của bạn.</p>

                    <a href='$verifyUrl'
                        style='display:inline-block;margin-top:20px;padding:10px 20px;background:#ff6a00;
                               color:white;text-decoration:none;border-radius:6px;font-size:16px;'>
                        Xác thực tài khoản
                    </a>

                    <p style='margin-top:30px;color:#555;'>Nếu bạn không thực hiện yêu cầu này, vui lòng bỏ qua email.</p>

                    <p style='margin-top:10px;'>Trân trọng,<br><b>Đội ngũ hỗ trợ</b></p>
                </div>
            ";

            $mail->send();
        } catch (Exception $e) {
            error_log("Mail error: " . $mail->ErrorInfo);
        }
    }
}
