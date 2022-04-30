<?php

namespace App\Modules\Transaction\Transaction\Contracts;

interface TransactionInterface
{
    /**
     * Validate Inputs
     */
    public function validate();

    /**
     * Return total amount
     */
    public function amount();

    /**
     * Return Inputs
     */
    public function inputs();
}