<?php

namespace App\AdminLibrary\Contracts;

interface LanguageSortContract
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
