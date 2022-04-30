<?php

namespace App\Modules\Transaction\Strategies\Cash\Concerns;

use App\Modules\Transaction\Strategies\Cash\Data\BanknoteData;
use App\Modules\Transaction\Strategies\Cash\Data\BanknoteDataCollection;
use App\Modules\Transaction\Strategies\Cash\Data\CashTransactionData;
use Cknow\Money\Money;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait HasActions
{
    /**
     * @throws ValidationException
     */
    public function validate()
    {
        Validator::make(
            $this->attributes_to_validate,
            array_map(function ($value) {
                return ['banknote.'.$value => 'required|numeric'];
            }, self::ACCEPTED_VALUES)
        )->validate();
        $this->checkLimitExceeded();

        $this->setValidatedAttributes();
    }

    public function setValidatedAttributes(): void
    {
        $this->validated_attributes = new CashTransactionData(
            banknotes: $this->createDataCollection(),
            amount: Money::parseByDecimal($this->calculateAmount($this->attributes_to_validate['banknote']), 'EUR')
        );

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

    private function checkLimitExceeded(): void
    {
        if (Money::parseByDecimal($this->calculateAmount($this->attributes_to_validate['banknote']), 'EUR')
            ->greaterThanOrEqual(\Money\Money::EUR(self::MAX_LIMIT))) {
            throw new \RuntimeException('Cash Machine cash transaction limit exceeded !');
        }
    }

    private function createDataCollection(): BanknoteDataCollection
    {
        return new BanknoteDataCollection(
            BanknoteData::class,
            collect($this->attributes_to_validate['banknote'])
                ->map(function ($qty, $banknote) {
                    return ['value' => (int)$banknote, 'qty' => (int)$qty];
                })->whereIn('value', self::ACCEPTED_VALUES)->values()
        );
    }

    private function calculateAmount(array $banknotes): int
    {
        $amount = 0;

        foreach ($banknotes as $banknote => $qty) {
            $amount += $banknote * $qty;
        }

        return $amount;
    }
}