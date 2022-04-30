<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Transaction\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class BankController extends Controller
{
    public function create(): View
    {
        return view('transactions.bank');
    }
}