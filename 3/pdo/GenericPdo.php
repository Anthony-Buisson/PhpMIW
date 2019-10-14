<?php
abstract class GenericPdo
{
    protected PDO $bdd;
    /**
     * GenericPdo constructor.
     * @param $bdd
     */
    public function __construct()
    {
        $this->bdd = new PDO(
            'mysql:host=localhost;dbname=test;charset=utf8',
            'root',
            '',
            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING)
        );
    }
}