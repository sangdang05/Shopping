<?php

namespace App\AdminLibrary\Contracts;

interface RedirectSortContract
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
