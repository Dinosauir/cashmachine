<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Strategies\Bank\Data;

use Carbon\Carbon;
use Cknow\Money\Money;
use Spatie\LaravelData\Data;

class BankTransactionData extends Data
{
    public function __construct(
        public Carbon $transferred_at,
        public string $customer_name,
        public string $account_number,
        public Money $amount
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            transferred_at: Carbon::parse($data['transferred_at']),
            customer_name: $data['customer_name'],
            account_number: $data['account_number'],
            amount: Money::parseByDecimal($data['amount'], 'EUR')
        );
    }
}