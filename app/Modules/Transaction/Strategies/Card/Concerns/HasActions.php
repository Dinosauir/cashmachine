<?php

declare(strict_types=1);

namespace App\Modules\Transaction\Strategies\Card\Concerns;

use App\Modules\Transaction\Strategies\Card\Data\CardTransactionData;
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
            'card_number' => 'required|regex:/^\b4\d{3}[ -]?\d{4}[ -]?\d{4}[ -]?\d{4}\b/u',
            'expire_at' => 'required|after:+2 month',
            'card_holder' => 'required|string',
            'cvv' => 'required|numeric|digits:3',
            'amount' => 'required|numeric'
        ])->validate();

        $this->setValidatedAttributes();
    }

    public function setValidatedAttributes(): void
    {
        $this->validated_attributes = CardTransactionData::fromArray($this->attributes_to_validate);
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