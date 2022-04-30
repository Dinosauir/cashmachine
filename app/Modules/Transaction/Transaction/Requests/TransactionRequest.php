<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Transaction\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => 'required|string'
        ];
    }
}