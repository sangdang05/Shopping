<?php

namespace App\AdminLibrary\Contracts;

interface ErrorModelContract
{
    /**
     * @param \Throwable $exception
     * @return bool
     */
    public function shouldSaveError(\Throwable $exception);

    /**
     * @param \Throwable $exception
     * @return App\Models\Error
     */
    public function saveError(\Throwable $exception);

    /**
     * @return void
     */
    public static function deleteOld();
}
