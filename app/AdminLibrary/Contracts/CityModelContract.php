<?php

namespace App\AdminLibrary\Contracts;

interface CityModelContract
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country();

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state();

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Contracts\CountryModelContract|int $country
     */
    public function scopeFromCountry($query, $country);

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Contracts\StateModelContract|int $state
     */
    public function scopeFromState($query, $state);

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeAlphabetically($query);
}
