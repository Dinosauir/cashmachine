<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Transaction\Factories;

use App\Modules\CashMachine\CashMachine;
use App\Modules\Transaction\Transaction\Contracts\TransactionInterface;
use Illuminate\Http\Request;

class TransactionFactory
{
    public static function make(string $transactionClass, Request $request): int
    {
        if (!class_exists($transactionClass)) {
            throw new \RuntimeException('Class {'.$transactionClass.'} does not exist');
        }

        return self::store(new $transactionClass($request->all()));
    }

    public static function store(TransactionInterface $transaction): int
    {
        return (new CashMachine())->store($transaction);
    }
}
