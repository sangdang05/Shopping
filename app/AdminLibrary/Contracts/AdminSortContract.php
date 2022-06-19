<?php

namespace App\AdminLibrary\Contracts;

interface AdminSortContract
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
