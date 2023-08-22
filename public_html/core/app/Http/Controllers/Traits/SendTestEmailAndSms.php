<?php

namespace App\Http\Controllers\Traits;

use App\Lib\SendSms;
use App\Models\GeneralSetting;

trait SendTestEmailAndSms
{


    public function sendTestEmail($email)
    {
        $general = GeneralSetting::first();
        $config = $general->mail_config;
        $receiver_name = explode('@', $email)[0];
        $subject = 'Testing ' . strtoupper($config->name) . ' Mail';
        $message = 'This is a test email, please ignore it if you are not meant to get this email.';

        try {
            sendGeneralEmail($email, $subject, $message, $receiver_name);
        } catch (\Exception $exp) {
            return $exp->getMessage();
        }
        return true;
    }


    public function sendTestSms($mobile)
    {
        $general = GeneralSetting::first(['sn', 'sms_config', 'sms_api', 'sitename']);
        if ($general->sn == 1) {
            $gateway = $general->sms_config->name;
            $sendSms = new SendSms;
            $message = shortCodeReplacer("{{name}}", 'Admin', $general->sms_api);
            $message = shortCodeReplacer("{{message}}", 'This is a test sms', $message);
            try {
                $sendSms->$gateway($mobile, $general->sitename, $message, $general->sms_config);
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
        return true;
    }
}
