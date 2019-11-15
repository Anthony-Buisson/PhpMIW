<?php


class Bmw extends Vehicule
{
    /**
     * Bmw constructor.
     */
    public function __construct()
    {
        $this->marque = 'Bmw';
    }

    public function reculer(){
        if($this->jauge>0){
            $this->kmParcouru+=3;
            $this->jauge-=2;
            return true;
        }else{
            $this->erreur .= 'Panne d\'essence!<br />';
            return false;
        }
    }

    public function avancer()
    {
        if($this->jauge>0){
            $this->kmParcouru+=3;
            $this->jauge-=2;
            if(rand(0,19)==0){
                $this->erreur .= 'Accident!<br />';
                return false;
            }
            return true;
        }else{
            $this->erreur .= 'Panne d\'essence!<br />';
            return false;
        }
    }
}