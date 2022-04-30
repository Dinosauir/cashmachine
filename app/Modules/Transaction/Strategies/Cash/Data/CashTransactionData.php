<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Strategies\Cash\Data;

use Cknow\Money\Money;
use Spatie\LaravelData\Data;

class CashTransactionData extends Data
{
    public function __construct(
        public BanknoteDataCollection $banknotes,
        public Money $amount
    ) {
    }
}