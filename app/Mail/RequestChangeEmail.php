<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class RequestChangeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $admin_url;

    /**
     * RequestChangeEmail constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->admin_url = env('APP_DEBUG') == 'true' ? 'https://admin-dev.ezyedu.com' : 'https://admin.ezyedu.com';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.user.change-email')
                    ->subject('Request change email!');
    }
}
