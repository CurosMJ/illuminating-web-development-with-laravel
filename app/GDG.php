<?php

namespace App;

class GDG {

    /**
     * @var string
     */
    private $city;

    /**
     * GDG constructor.
     * @param $city
     */
    public function __construct($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return "GDG".ucfirst($this->city);
    }

    /**
     * @return string
     */
    public function website()
    {
        return "https://{$this->city}.gdg.com";
    }
}