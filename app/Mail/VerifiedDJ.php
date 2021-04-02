<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifiedDJ extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->user = User::findorFail($id);
        $this->link = 'https://djsaroundtheworld.com/cdjvpayment/'.$this->user->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('DJ Verification Complete - ' . date("F j, Y, h:i:s A") )->markdown('mailer.verification')->with(
            [
                'user' => $this->user,
                'link' => $this->link,
            ]
        );
    }
}
