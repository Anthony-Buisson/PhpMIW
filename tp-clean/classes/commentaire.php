<?php


class commentaire
{
    private $id;
    private $titre;
    private $contenu;
    private $id_user;
    private $id_article;
    private $datetime;

    /**
     * commentaire constructor.
     * @param $titre
     * @param $contenu
     * @param $id_user
     * @param $id_article
     * @param $datetime
     */
    public function __construct($titre, $contenu, $id_user, $id_article, $datetime)
    {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->id_user = $id_user;
        $this->id_article = $id_article;
        $this->datetime = $datetime;
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
    public function getIdArticle()
    {
        return $this->id_article;
    }

    /**
     * @return mixed
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



}