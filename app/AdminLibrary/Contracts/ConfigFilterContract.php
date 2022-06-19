<?php

namespace App\AdminLibrary\Contracts;

interface ConfigFilterContract
{
    /**
     * @return string
     */
    public function morph();

    /**
     * @return array
     */
    public function filters();

    /**
     * @return array
     */
    public function modifiers();
}
