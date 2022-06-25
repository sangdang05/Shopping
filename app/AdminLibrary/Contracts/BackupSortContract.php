<?php

namespace App\AdminLibrary\Contracts;

interface BackupSortContract
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
