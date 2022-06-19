<?php

namespace App\AdminLibrary\Contracts;

interface UploadedHelperContract
{
    /**
     * @param string $file
     */
    public function __construct($file);

    /**
     * @return string
     */
    public function thumbnail();

    /**
     * @param string|null $style
     * @return string
     */
    public function url($style = null);

    /**
     * @param string|null $style
     * @param bool $full
     * @return string
     */
    public function path($style = null, $full = false);

    /**
     * @return bool
     */
    public function exists();
}
