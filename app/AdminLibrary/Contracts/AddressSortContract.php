<?php

namespace App\AdminLibrary\Contracts;

interface AddressSortContract
{
    /**
     * @return string
     */
    public function field();

    /**
     * @return string
     */
    public function direction();
}
