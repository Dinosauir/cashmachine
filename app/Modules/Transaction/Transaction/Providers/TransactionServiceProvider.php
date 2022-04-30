<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Transaction\Providers;

use Illuminate\Support\ServiceProvider;

class TransactionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom('app/Modules/Transaction/Transaction/database/migrations');
    }
}