<?php

namespace App\AdminLibrary\Contracts;

interface TranslationSortContract
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
