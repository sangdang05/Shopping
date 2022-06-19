<?php

namespace App\AdminLibrary\Contracts;

interface ActivitySortContract
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
