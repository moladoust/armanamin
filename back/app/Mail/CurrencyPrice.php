<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CurrencyPrice extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $currencyPrices;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($currencyPrices)
    {
        $this->currencyPrices = $currencyPrices;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.currency-price');
    }
}
