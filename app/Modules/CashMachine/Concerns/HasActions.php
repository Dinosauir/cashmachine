<?php

declare(strict_types=1);

namespace App\Modules\CashMachine\Concerns;

use App\Modules\Transaction\Transaction\Contracts\TransactionInterface;
use App\Modules\Transaction\Transaction\Transaction;

trait HasActions
{
    public function store(TransactionInterface $transaction): int
    {
        $transaction->validate();

        $transaction = Transaction::fromTransaction($transaction);

        $transaction->save();

        return $transaction->id;
    }
}