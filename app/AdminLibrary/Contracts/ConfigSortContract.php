<?php

namespace App\AdminLibrary\Contracts;

interface ConfigSortContract
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
