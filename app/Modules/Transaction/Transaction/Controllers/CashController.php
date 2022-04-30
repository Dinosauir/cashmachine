<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Transaction\Controllers;

use App\Http\Controllers\Controller;

class CashController extends Controller
{
    public function create()
    {
        return view('transactions.cash');
    }
}