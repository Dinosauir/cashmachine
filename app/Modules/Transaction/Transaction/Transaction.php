<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Transaction;

use App\Modules\Transaction\Transaction\Contracts\TransactionInterface;
use App\Modules\Transaction\Transaction\Concerns\HasFactories;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $amount
 * @property array|string $inputs
 * @method static fromTransaction(TransactionInterface $transaction)
 */
class Transaction extends Model
{
    use HasFactories;

//    protected $casts = [
//        'inputs' => 'array'
//    ];

    public const MAX_LIMIT = 20000;

    protected $guarded = ['id'];
}