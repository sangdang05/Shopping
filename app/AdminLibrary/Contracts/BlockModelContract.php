<?php

namespace App\AdminLibrary\Contracts;

interface BlockModelContract
{
    /**
     * @param string $class
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function blockables($class);

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeAlphabetically($query);
}
