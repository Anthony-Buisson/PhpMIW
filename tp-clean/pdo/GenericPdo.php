<?php
abstract class GenericPdo
{
    protected $bdd;
    /**
     * GenericPdo constructor.
     * @param $bdd
     */
    public function __construct()
    {
        $this->bdd = new PDO(
            'mysql:host=localhost;dbname=miw;charset=utf8',
            'root',
            '',
            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING)
        );
    }
}