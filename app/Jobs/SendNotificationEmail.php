<?php

namespace App\Jobs;

use App\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $mailClass;

    public $to;

    /**
     * SendNotificationEmail constructor.
     * @param $to
     * @param object $mailClass
     */
    public function __construct($to, Mailable $mailClass)
    {
        $this->mailClass = $mailClass;
        $this->to = $to;

        if ($to instanceof User) {
            $this->to = $to->email;
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->to) {
            Mail::to($this->to)
                // ->bcc(env('MAIL_BCC_ADDRESS'))
                ->send($this->mailClass);
        }
    }
}
