<?php

namespace App\AdminLibrary\Contracts;

interface BlockSortContract
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
