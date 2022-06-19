<?php

namespace App\AdminLibrary\Contracts;

interface MenuSortContract
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
