<?php
class country
{
    private $code;
    private $capital;
    private $code2;
    private $continent;
    private $gnp;
    private $gnpold;
    private $governmentform;
    private $headofstate;
    private $indepyear;
    private $lifeexpectancy;
    private $localname;
    private $name;
    private $population;
    private $region;
    private $surfacearea;

    /**
     * country constructor.
     * @param $code
     * @param $code2
     * @param $continent
     * @param $name
     * @param $region
     * @param $surfacearea
     */
    public function __construct($code, $code2, $continent, $name, $region, $surfacearea)
    {
        $this->code = $code;
        $this->code2 = $code2;
        $this->continent = $continent;
        $this->name = $name;
        $this->region = $region;
        $this->surfacearea = $surfacearea;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param mixed $capital
     */
    public function setCapital($capital): void
    {
        $this->capital = $capital;
    }

    /**
     * @return mixed
     */
    public function getCode2()
    {
        return $this->code2;
    }

    /**
     * @param mixed $code2
     */
    public function setCode2($code2): void
    {
        $this->code2 = $code2;
    }

    /**
     * @return mixed
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * @param mixed $continent
     */
    public function setContinent($continent): void
    {
        $this->continent = $continent;
    }

    /**
     * @return mixed
     */
    public function getGnp()
    {
        return $this->gnp;
    }

    /**
     * @param mixed $gnp
     */
    public function setGnp($gnp): void
    {
        $this->gnp = $gnp;
    }

    /**
     * @return mixed
     */
    public function getGnpold()
    {
        return $this->gnpold;
    }

    /**
     * @param mixed $gnpold
     */
    public function setGnpold($gnpold): void
    {
        $this->gnpold = $gnpold;
    }

    /**
     * @return mixed
     */
    public function getGovernmentform()
    {
        return $this->governmentform;
    }

    /**
     * @param mixed $governmentform
     */
    public function setGovernmentform($governmentform): void
    {
        $this->governmentform = $governmentform;
    }

    /**
     * @return mixed
     */
    public function getHeadofstate()
    {
        return $this->headofstate;
    }

    /**
     * @param mixed $headofstate
     */
    public function setHeadofstate($headofstate): void
    {
        $this->headofstate = $headofstate;
    }

    /**
     * @return mixed
     */
    public function getIndepyear()
    {
        return $this->indepyear;
    }

    /**
     * @param mixed $indepyear
     */
    public function setIndepyear($indepyear): void
    {
        $this->indepyear = $indepyear;
    }

    /**
     * @return mixed
     */
    public function getLifeexpectancy()
    {
        return $this->lifeexpectancy;
    }

    /**
     * @param mixed $lifeexpectancy
     */
    public function setLifeexpectancy($lifeexpectancy): void
    {
        $this->lifeexpectancy = $lifeexpectancy;
    }

    /**
     * @return mixed
     */
    public function getLocalname()
    {
        return $this->localname;
    }

    /**
     * @param mixed $localname
     */
    public function setLocalname($localname): void
    {
        $this->localname = $localname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population): void
    {
        $this->population = $population;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region): void
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getSurfacearea()
    {
        return $this->surfacearea;
    }

    /**
     * @param mixed $surfacearea
     */
    public function setSurfacearea($surfacearea): void
    {
        $this->surfacearea = $surfacearea;
    }



}