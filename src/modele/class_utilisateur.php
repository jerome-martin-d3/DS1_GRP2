<?php

class Utilisateur{
    private $db;
    private $insert;
    
    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("insert into Utilisateur(nom, prenom, adresse, cp, ville) values(:nom, :prenom, :adresse, :cp, :ville)");
    }
    public function insert($nom, $prenom, $adresse, $cp, $ville){
        $this->insert->execute(array(':nom'=> $nom, ':prenom'=> $prenom, ':adresse'=> $adresse, ':cp'=> $cp, ':ville'=> $ville));
        if($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo());            
        }        
    }
}