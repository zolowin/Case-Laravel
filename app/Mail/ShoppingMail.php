<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Transaction;
use App\Order;

class ShoppingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $transaction;
    public $orders;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transaction, $orders)
    {
        $this->transaction = $transaction;
        $this->orders = $orders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.shopping');
    }
}
