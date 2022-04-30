<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Strategies\Cash;

use App\Modules\Transaction\Strategies\Cash\Concerns\HasActions;
use App\Modules\Transaction\Strategies\Cash\Data\CashTransactionData;
use App\Modules\Transaction\Transaction\Contracts\TransactionInterface;

/**
 * @property-read int $id
 * @property array $attributes_to_validate
 * @property CashTransactionData|null $validated_attributes
 */
class CashTransaction implements TransactionInterface
{
    use HasActions;

    public ?CashTransactionData $validated_attributes = null;

    public const MAX_LIMIT = 1000000;
    public const ACCEPTED_VALUES = [1, 5, 10, 50, 100];

    public function __construct(private array $attributes_to_validate)
    {
    }
}