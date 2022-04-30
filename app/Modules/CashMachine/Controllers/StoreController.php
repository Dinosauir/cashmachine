<?php

declare(strict_types=1);

namespace App\Modules\CashMachine\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Transaction\Transaction\Factories\TransactionFactory;
use App\Modules\Transaction\Transaction\Requests\TransactionRequest;
use App\Modules\Transaction\Transaction\Services\TransactionService;
use Illuminate\Http\RedirectResponse;

use function redirect;

class StoreController extends Controller
{
    public function __construct(private TransactionService $service)
    {
    }

    public function store(TransactionRequest $request): RedirectResponse
    {
        $transactionClass = $this->service->resolveType($request->input('type'));
        $this->service->checkLimitExceeded();

        $id = TransactionFactory::make($transactionClass, $request);

        return redirect()->route('transaction.info', $id);
    }


}