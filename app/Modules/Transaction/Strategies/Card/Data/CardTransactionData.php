<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Strategies\Card\Data;

use Carbon\Carbon;
use Cknow\Money\Money;
use Spatie\LaravelData\Data;

class CardTransactionData extends Data
{
    public function __construct(
        public string $card_number,
        public Carbon $expire_at,
        public string $card_holder,
        public int $cvv,
        public Money $amount
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            card_number: $data['card_number'],
            expire_at: Carbon::parse($data['expire_at']),
            card_holder: $data['card_holder'],
            cvv: (int)$data['cvv'],
            amount: Money::parseByDecimal($data['amount'], 'EUR')
        );
    }
}