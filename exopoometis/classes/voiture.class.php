<?php

class Voiture {
    private $immatriculation; // string
    private $couleur; // string
    private $poids; // int
    private $puissance; // int 
    private $capacite_reservoir; // float
    private $niveau_essence; // float
    private $nombre_places; // int
    private $assure; // bool
    private $message; // string

    public function __construct ($immatriculation, $couleur, $poids, $puissance,
    $capacite_reservoir, $nombre_places){
        // initialisation des paramètres reçus
        $this->immatriculation = $immatriculation;
        $this->couleur = $couleur;
        $this->poids = $poids;
        $this->puissance = $puissance;
        $this->capacite_reservoir = $capacite_reservoir;
        $this->nombre_places = $nombre_places;

        // initialisation autres attributs
        $this->niveau_essence = 5.0;
        $this->assure = false;
        $this->message = "Bonjour !";
    }

    // GETTERS
    public function getImmatriculation(){
        return $this->immatriculation;
    }
    public function getCouleur(){
        return $this->couleur;
    }
    public function getPoids(){
        return $this->poids;
    }
    public function getPuissance(){
        return $this->puissance;
    }
    public function getCapaciteReservoir(){
        return $this->capacite_reservoir;
    }
    public function getNombrePlaces(){
        return $this->nombre_places;
    }
    public function getNiveauEssence(){
        return $this->niveau_essence;
    }
    public function getAssure(){
        return $this->assure;
    }
    public function getMessage(){
        return $this->message;
    }

    //SETTERS
    public function setAssure($assure){
        $this->assure = $assure;
        if($assure){
            $this->message = "Merci de m'avoir assurée";
        }else{
            $this->message = "Attention, je ne suis plus assurée !";
        }
    }

    public function repeindre($couleur = null){
        // contrôle paramètre reçu
        if(!isset($couleur)){
            $this->message = "Erreur : j'ai besoin de connaitre la nouvelle couleur !";
            return false;
        }
        // message feed-back
        if($couleur != $this->couleur){
            $this->message = ucfirst($couleur);
            $this->message .= " ! Tu m'as changé de couleur !";
        }else{
            $this->message = "Merci de m'avoir rafraîchi le teint !";
        }
        // modifier la couleur
        $this->couleur = $couleur;
        return true;
    }

    public function Mettre_essence($quantite){
        //test si la quantité peut tenir dans le réservoir
        if($quantite > ($this->capacite_reservoir - $this->niveau_essence)){
            //ERREUR : ça va déborder
            $this->message = $quantite."L ! Tu ne peux pas ajouter cette quantité ! 
            J'ai déjà ". $this->niveau_essence . "L !";
        }else{
            //augmenter le niveau d'essence 
            $this->niveau_essence += $quantite;
            $this->message = "Merci pour le carburant, j'ai maintenant ". $this->niveau_essence . "L !";
        }
        return $this->niveau_essence;
    }
}