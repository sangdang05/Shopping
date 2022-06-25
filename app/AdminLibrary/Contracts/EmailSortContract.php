<?php

namespace App\AdminLibrary\Contracts;

interface EmailSortContract
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
