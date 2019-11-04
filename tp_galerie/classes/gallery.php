<?php
/**
 * Created by PhpStorm.
 * User: anti1
 * Date: 04/11/2019
 * Time: 01:32
 */

class gallery
{
    private $id;
    private $countrycode;
    private $name;
    private $description;

    /**
     * gallery constructor.
     * @param $countrycode
     * @param $name
     * @param $description
     */
    public function __construct($countrycode, $name, $description)
    {
        $this->countrycode = $countrycode;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCountrycode()
    {
        return $this->countrycode;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }



}