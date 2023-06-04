<?php

namespace App\JobClasses;

use App\Mail\CurrencyPrice;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailSender
{
  public function __invoke()
  {
    $currencyPrices = $this->_getCurrencyPrices();

    $users = User::all();
    foreach ($users as $user) {
      Mail::to($user->email)->send(new CurrencyPrice($currencyPrices));
    }
  }

  private function _getCurrencyPrices()
  {
    return [
      "usd_dollar" => [
        "value" => "11270",
        "change" => -25,
        "timestamp" => 1568212950,
        "date" => "1401-06-20 19:12:30",
      ]
    ];
  }
}
