<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details; // Pass details to the view
    }

    public function build()
    {
        return $this->subject('Payment Reminder')
                    ->view('mail.paymentReceipt'); // Ensure the view path is correct
    }
}
