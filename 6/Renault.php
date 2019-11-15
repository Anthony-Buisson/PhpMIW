<?php


class Renault extends Vehicule
{
    /**
     * Renault constructor.
     */
    public function __construct()
    {
        $this->marque = 'Renault';
    }

    public function reculer(){
        if($this->jauge>0){
            $this->kmParcouru++;
            $this->jauge-=0.5;
            return true;
        }else{
            $this->erreur .= 'Panne d\'essence!<br />';
            return false;
        }
    }

    public function avancer()
    {
        if($this->jauge>0){
            $this->kmParcouru++;
            $this->jauge-=0.5;
            if(rand(0,99)==0){
                $this->erreur .= 'Accident!<br />';
                return false;
            }
            if(rand(0,99) === (0 || 1 || 2)){
                $this->erreur .= 'Panne mécanique!<br />';
                return false;
            }
            return true;
        }else{
            $this->erreur .= 'Panne d\'essence!<br />';
            return false;
        }
    }
}