<?php

namespace App\AdminLibrary\Contracts;

interface CountrySortContract
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
