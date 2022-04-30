<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Strategies\Cash\Data;

use Spatie\LaravelData\Data;

class BanknoteData extends Data
{
    public function __construct(
        public int $value,
        public int $qty
    ) {
    }
}