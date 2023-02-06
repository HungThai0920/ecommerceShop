<?php

namespace App\Helpers;
use App\Http\Responses\Api;
use App\Mail\GeneralMail;
use App\Jobs\SendMailJob;
use Auth,DB;
use Illuminate\Support\Facades\Request;


class MailHelper
{
    /**
     * Send mail sign up
     * 
     * @param Transaction $transaction
     */
    public static function sendMail($data)
    {
        //Send mail
        $dataMail['email']   = $data->email;
        $dataMail['name']    = $data->name;
        $dataMail['subject'] = 'Thông báo hủy đơn hàng ';
        $mailJob = new GeneralMail();
        $mailJob->setFromDefault()
                ->setView('emails.mail_infomation', $data)
                ->setSubject($dataMail['subject'])
                ->setTo($dataMail['email']);
        dispatch(new SendMailJob($mailJob));
    }
}
