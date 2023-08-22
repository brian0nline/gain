<?php

use App\Lib\SendSms;
use App\Models\EmailLog;
use App\Models\EmailTemplate;
use App\Models\GeneralSetting;
use App\Models\SmsTemplate;
use PHPMailer\PHPMailer\PHPMailer;

function notify($user, $type, $shortCodes = null)
{
    try {

        sendEmail($user, $type, $shortCodes);
        sendSms($user, $type, $shortCodes);
    } catch (\Throwable $th) {
    }
}


function sendSms($user, $type, $shortCodes = [])
{
    try {
        $general = GeneralSetting::first();
        $smsTemplate = SmsTemplate::where('act', $type)->where('sms_status', 1)->first();
        $gateway = $general->sms_config->name;
        $sendSms = new SendSms;
        if ($general->sn == 1 && $smsTemplate) {
            $template = $smsTemplate->sms_body;
            foreach ($shortCodes as $code => $value) {
                $template = shortCodeReplacer('{{' . $code . '}}', $value, $template);
            }
            $message = shortCodeReplacer("{{message}}", $template, $general->sms_api);
            $message = shortCodeReplacer("{{name}}", $user->username, $message);
            $sendSms->$gateway($user->mobile, $general->sitename, $message, $general->sms_config);
        }
    } catch (\Throwable $th) {
    }
}

function sendEmail($user, $type = null, $shortCodes = [])
{
    $general = GeneralSetting::first();

    $emailTemplate = EmailTemplate::where('act', $type)->where('email_status', 1)->first();
    // if ($general->en != 1 || !$emailTemplate) {
    //     return;
    // }

    $message = shortCodeReplacer("{{fullname}}", $user->fullname, $general->email_template);
    $message = shortCodeReplacer("{{username}}", $user->username, $message);
    $message = shortCodeReplacer("{{message}}", $emailTemplate->email_body, $message);

    if (empty($message)) {
        $message = $emailTemplate->email_body;
    }

    foreach ($shortCodes as $code => $value) {
        $message = shortCodeReplacer('{{' . $code . '}}', $value, $message);
    }

    $config = $general->mail_config;

    $emailLog = new EmailLog();
    $emailLog->user_id = $user->id;
    $emailLog->mail_sender = $config->name;
    $emailLog->email_from = $general->sitename . ' ' . $general->email_from;
    $emailLog->email_to = $user->email;
    $emailLog->subject = $emailTemplate->subj;
    $emailLog->message = $message;
    $emailLog->save();


    if ($config->name == 'php') {
        sendPhpMail($user->email, $user->username, $emailTemplate->subj, $message, $general);
    } else if ($config->name == 'smtp') {
        sendSmtpMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general);
    } else if ($config->name == 'sendgrid') {
        sendSendGridMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general);
    } else if ($config->name == 'mailjet') {
        sendMailjetMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general);
    }
}


function sendPhpMail($receiver_email, $receiver_name, $subject, $message, $general)
{
    $headers = "From: $general->sitename <$general->email_from> \r\n";
    $headers .= "Reply-To: $general->sitename <$general->email_from> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    @mail($receiver_email, $subject, $message, $headers);
}


function sendSmtpMail($config, $receiver_email, $receiver_name, $subject, $message, $general)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        //  $mail->SMTPDebug = true;
        $mail->Host = $config->host;
         $mail->isSMTP(); 

        $mail->SMTPAuth = false;
        $mail->Username = $config->username;
        $mail->Password = $config->password;
        if ($config->enc == 'ssl') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } else {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }
        $mail->Port = $config->port;
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom($general->email_from, $general->sitename);
        $mail->addAddress($receiver_email, $receiver_name);
        $mail->addReplyTo($general->email_from, $general->sitename);
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();
    } catch (Exception $e) {
        dd($e->getMessage());

        throw new Exception($e);
    }
}


function sendSendGridMail($config, $receiver_email, $receiver_name, $subject, $message, $general)
{
    $sendgridMail = new \SendGrid\Mail\Mail();
    $sendgridMail->setFrom($general->email_from, $general->sitename);
    $sendgridMail->setSubject($subject);
    $sendgridMail->addTo($receiver_email, $receiver_name);
    $sendgridMail->addContent("text/html", $message);
    $sendgrid = new \SendGrid($config->appkey);
    try {
        $response = $sendgrid->send($sendgridMail);
    } catch (Exception $e) {
        throw new Exception($e);
    }
}


function sendMailjetMail($config, $receiver_email, $receiver_name, $subject, $message, $general)
{
    $mj = new \Mailjet\Client($config->public_key, $config->secret_key, true, ['version' => 'v3.1']);
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => $general->email_from,
                    'Name' => $general->sitename,
                ],
                'To' => [
                    [
                        'Email' => $receiver_email,
                        'Name' => $receiver_name,
                    ]
                ],
                'Subject' => $subject,
                'TextPart' => "",
                'HTMLPart' => $message,
            ]
        ]
    ];
    $response = $mj->post(\Mailjet\Resources::$Email, ['body' => $body]);
}


//moveable
function sendGeneralEmail($email, $subject, $message, $receiver_name = '')
{

    $general = GeneralSetting::first();


    if ($general->en != 1 || !$general->email_from) {
        return;
    }


    $message = shortCodeReplacer("{{message}}", $message, $general->email_template);
    $message = shortCodeReplacer("{{fullname}}", $receiver_name, $message);
    $message = shortCodeReplacer("{{username}}", $email, $message);

    $config = $general->mail_config;

    if ($config->name == 'php') {
        sendPhpMail($email, $receiver_name, $subject, $message, $general);
    } else if ($config->name == 'smtp') {
        sendSmtpMail($config, $email, $receiver_name, $subject, $message, $general);
    } else if ($config->name == 'sendgrid') {
        sendSendGridMail($config, $email, $receiver_name, $subject, $message, $general);
    } else if ($config->name == 'mailjet') {
        sendMailjetMail($config, $email, $receiver_name, $subject, $message, $general);
    }
}
