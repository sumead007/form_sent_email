<?php
session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if (!empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);


        $province = trim(@$_POST['province']);
        $service = @$_POST['service'];
        $name = trim(@$_POST['name']);
        $lastname = trim(@$_POST['lastname']);
        $telephone = trim(@$_POST['telephone']);
        $service_str = "";

        if (count($service) == 0) {
            $service_str = "ไม่ได้ระบุ";
        } else {
            for ($i = 0; $i < count($service); $i++) {
                $service_str .= $service[$i] . " ";
            }
        }

        print_r($service_str);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'serviceforbes22@gmail.com';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet = "utf-8";

            //Recipients
            $mail->setFrom('serviceforbes22@gmail.com', "$name  $lastname");
            #คนรับ
            $mail->addAddress('sumead007@gmail.com', 'serviceforbes22');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "บริการหลังการขาย";
            $mail->Body    = "<b>บริการหลังการขาย:</b> $service_str <br> 
            <b>คุณ:</b> $name  $lastname <br> 
            <b>หมายเลขโทรศัพท์ที่ใช้ติดต่อ:</b> $telephone <br>
            <b>จังหวัด:</b> $province
            ";
            $mail->AltBody = "บริการหลังการขาย: $service_str, 
            คุณ: $name  $lastname, 
            หมายเลขโทรศัพท์ที่ใช้ติดต่อ: $telephone,
            จังหวัด: $province,
            ";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
