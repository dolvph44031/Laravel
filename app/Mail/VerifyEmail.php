<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $token;

    /**
     * Create a new message instance.
     *
     * @param string $userName
     * @param string $token
     * @return void
     */
    public function __construct($userName, $token)
    {
        $this->userName = $userName;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Xác nhận tài khoản hệ thống Lê Văn Đô', // tiêu đề email
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'users.auth.verifyEmail', // chèn template ở file html
            with: [
                'token' => $this->token,
                'userName' => $this->userName,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
