<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Transaction\Services;


use App\Modules\Transaction\Transaction\Transaction;

class TransactionService
{
    public function resolveType(string $type): string
    {
        if (!in_array($type, ['card', 'bank', 'cash'])) {
            throw new \RuntimeException('There must be something wrong with your form');
        }
        $namespace = explode('\\', __NAMESPACE__);
        unset($namespace[4], $namespace[3]);
        $class = implode('\\', $namespace).'\\Strategies\\'.ucfirst($type).'\\'.ucfirst($type).'Transaction';

        if (!class_exists($class)) {
            throw new \RuntimeException('There`s no implementation for {'.$type.'} yet !');
        }

        return $class;
    }

    public function checkLimitExceeded()
    {
        if (Transaction::query()->sum('amount') > Transaction::MAX_LIMIT) {
            throw new \RuntimeException('Cash Machine limit exceeded !');
        }
    }
}