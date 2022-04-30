<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Strategies\Card;

use App\Modules\Transaction\Strategies\Card\Concerns\HasActions;
use App\Modules\Transaction\Strategies\Card\Data\CardTransactionData;
use App\Modules\Transaction\Transaction\Contracts\TransactionInterface;

/**
 * @property-read int $id
 * @property array $attributes_to_validate
 * @property CardTransactionData|null $validated_attributes
 */
class CardTransaction implements TransactionInterface
{
    use HasActions;

    private ?CardTransactionData $validated_attributes = null;

    public function __construct(private array $attributes_to_validate)
    {
    }
}