<?php
/**
 * Created by PhpStorm.
 * User: anti1
 * Date: 04/11/2019
 * Time: 01:32
 */

class article
{
    private $id;
    private $titre;
    private $contenu;
    private $id_user;
    private $datetime;
    private $image;

    /**
     * article constructor.
     * @param $titre
     * @param $contenu
     * @param $id_user
     * @param $datetime
     * @param $image
     */
    public function __construct($titre, $contenu, $id_user, $datetime = null, $image = null)
    {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->id_user = $id_user;
        $this->datetime = $datetime;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @return mixed
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


}