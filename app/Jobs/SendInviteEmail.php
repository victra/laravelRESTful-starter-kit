<?php

namespace App\Jobs;

use App\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendInviteEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $mailClass;

    public $to;

    /**
     * SendInviteEmail constructor.
     * @param $to
     * @param object $mailClass
     */
    public function __construct($to, Mailable $mailClass)
    {
        $this->mailClass = $mailClass;
        $this->to = $to;
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
                ->queue($this->mailClass);
        }
    }
}
