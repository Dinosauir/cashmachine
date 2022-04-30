<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Strategies\Bank;

use App\Modules\Transaction\Strategies\Bank\Concerns\HasActions;
use App\Modules\Transaction\Strategies\Bank\Data\BankTransactionData;
use App\Modules\Transaction\Transaction\Contracts\TransactionInterface;

/**
 * @property-read int $id
 * @property array $attributes_to_validate
 * @property BankTransactionData|null $validated_attributes
 */
class BankTransaction implements TransactionInterface
{
    use HasActions;

    private ?BankTransactionData $validated_attributes = null;

    public function __construct(private array $attributes_to_validate)
    {
    }
}