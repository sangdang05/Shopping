<?php

namespace App\AdminLibrary\Options;

use Exception;

class ActivityOptions
{
    /**
     * A short model definition name for easy readability.
     * For \App\User -> "user".
     *
     * @var string
     */
    private $type;

    /**
     * A value representing the name of the entity to be logged.
     * This field should return an attribute of the loaded model instance.
     *
     * @var string
     */
    private $name;

    /**
     * A value representing the url of the entity to be logged.
     * This value will be used to link the activity log info to the page of the entity.
     *
     * @var string
     */
    private $url;

    /**
     * Get the value of a property of this class.
     *
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        if (property_exists(static::class, $name)) {
            return $this->{$name};
        }

        throw new Exception(
            'The property "' . $name . '" does not exist in class "' . static::class . '"'
        );
    }

    /**
     * Get a fresh instance of this class.
     *
     * @return ActivityOptions
     */
    public static function instance(): ActivityOptions
    {
        return new static();
    }

    /**
     * Set the $type to work with in the App\Traits\HasActivity trait.
     *
     * @param $type
     * @return ActivityOptions
     */
    public function withEntityType($type): ActivityOptions
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the $name to work with in the App\Traits\HasActivity trait.
     *
     * @param $name
     * @return ActivityOptions
     */
    public function withEntityName($name): ActivityOptions
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the $url to work with in the App\Traits\HasActivity trait.
     *
     * @param $url
     * @return ActivityOptions
     */
    public function withEntityUrl($url): ActivityOptions
    {
        $this->url = $url;

        return $this;
    }
}
