<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Transaction\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Transaction\Transaction\Transaction;

class InfoController extends Controller
{
    public function show(int $id)
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::findOrFail($id);

        return view('transactions.info')->with(compact('transaction'));
    }
}