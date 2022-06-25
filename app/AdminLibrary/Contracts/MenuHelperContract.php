<?php

namespace App\AdminLibrary\Contracts;

use App\AdminLibrary\Menu\MenuItem;

interface MenuHelperContract
{
    /**
     * @param \Closure $callback
     * @return $this
     */
    public function make(\Closure $callback);

    /**
     * @param \Closure|null $callback
     * @return $this
     */
    public function filter(\Closure $callback = null);

    /**
     * @param \Closure $callback
     */
    public function add(\Closure $callback);

    /**
     * @return \Illuminate\Support\Collection
     */
    public function roots();

    /**
     * @param \Menu\MenuItem $parent
     * @param \Closure $callback
     */
    public function child(MenuItem $parent, \Closure $callback);

    /**
     * @param \Menu\MenuItem $parent
     * @return \Illuminate\Support\Collection
     */
    public function children(MenuItem $parent);
}
