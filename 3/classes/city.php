<?php

class city
{
    private int $id;
    private String $name;
    private String $countrycode;
    private String $district;
    private int $population;

    /**
     * city constructor.
     * @param $name
     * @param $countrycode
     * @param $district
     * @param $population
     */
    public function __construct($name, $countrycode, $district, $population = 0.0)
    {
        $this->name = $name;
        $this->countrycode = $countrycode;
        $this->district = $district;
        $this->population = $population;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCountrycode()
    {
        return $this->countrycode;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }



}