<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\AuthModel;
class Email extends BaseController
{



    public function sendMail()
    {
        $AuthModel = new AuthModel();
        $dataModel = $AuthModel->getEmail()[0];
        $mail = new PHPMailer(true);

        $pengirim = $this->request->getVar("name");
        $emailPengirim = $this->request->getVar("email");
        $subject = $this->request->getVar("subject");
        $message = $this->request->getVar("message");

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.googlemail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'wanoroseto128@gmail.com';                     //SMTP username
            $mail->Password   = 'demawjjnhrpbdvxm';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($emailPengirim, $pengirim);
            $mail->addAddress($dataModel["email"], $dataModel["name"]);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo($emailPengirim, $pengirim);


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Pesan Client";
            $mail->Body    = "<h1>$subject</h1><br>
                <ul>
                    <li>Nama : $pengirim</li>
                    <li>Email : $emailPengirim</li>
                    <li>Pesan : $message</li>
                </ul>
            ";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            session()->setFlashdata("success", "email sent successfully");
            return redirect()->back();
            return "success";
        } catch (Exception $e) {
            session()->setFlashdata("error", "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return redirect()->back();
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        // return redirect()->to(base_url("/"));
    }
}
