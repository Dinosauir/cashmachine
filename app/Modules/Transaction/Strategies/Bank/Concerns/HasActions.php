<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Strategies\Bank\Concerns;

use App\Modules\Transaction\Strategies\Bank\Data\BankTransactionData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait HasActions
{
    /**
     * @throws ValidationException
     */
    public function validate()
    {
        Validator::make($this->attributes_to_validate, [
            'transferred_at' => 'required|date|after_or_equal:today',
            'amount' => 'required|numeric',
            'customer_name' => 'required|string',
            'account_number' => 'required|string',
        ])->validate();

        $this->setValidatedAttributes();
    }

    public function setValidatedAttributes(): void
    {
        $this->validated_attributes = BankTransactionData::fromArray($this->attributes_to_validate);
        $this->attributes_to_validate = [];
    }

    /**
     * Return total amount
     */
    public function amount()
    {
        return $this->validated_attributes->amount->formatByDecimal();
    }

    /**
     * Return Inputs
     */
    public function inputs()
    {
        return $this->validated_attributes;
    }
}