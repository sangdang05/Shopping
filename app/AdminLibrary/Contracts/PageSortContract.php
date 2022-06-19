<?php

namespace App\AdminLibrary\Contracts;

interface PageSortContract
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
