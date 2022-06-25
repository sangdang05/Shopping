<?php

namespace App\AdminLibrary\Contracts;

interface ErrorSortContract
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
