<?php

namespace App\AdminLibrary\Contracts;

interface CitySortContract
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
