<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailHelper
{
    public static function sendApprovalMail($toEmail, $organizationName)
    {
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();

            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;

            $mail->Username = 'heromsd0@gmail.com';
            $mail->Password = 'anishgautam100';

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('heromsd0@gmail.com', 'Disaster Relief');

            $mail->addAddress($toEmail);

            $mail->isHTML(true);

            $mail->Subject = 'Organization Approved';

            $mail->Body = "
            <h2>Congratulations!</h2>

            <p>Dear <b>{$organizationName}</b>,</p>

            <p>Your organization has been approved by the Disaster Relief Management System.</p>

            <p>You can now login and manage your resources.</p>

            <br>

            <b>Thank you.</b>
            ";

            $mail->send();

        } catch (Exception $e) {

            return false;
        }

        return true;
    }
}