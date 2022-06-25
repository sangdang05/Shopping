<?php

namespace App\AdminLibrary\Contracts;

interface StateSortContract
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
