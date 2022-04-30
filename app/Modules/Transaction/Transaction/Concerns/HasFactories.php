<?php

namespace App\Modules\Transaction\Transaction\Concerns;

use App\Modules\Transaction\Transaction\Contracts\TransactionInterface;

trait HasFactories
{
    public static function fromTransaction(TransactionInterface $transaction): self
    {
        $model = new self;

        $model->amount = $transaction->amount();

        $model->inputs = json_encode($transaction->inputs());

        return $model;
    }

}