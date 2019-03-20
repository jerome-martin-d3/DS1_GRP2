<?php

class Utilisateur{
    private $db;
    private $insert;
    private $select;
    
    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("insert into Utilisateur(nom, prenom, adresse, cp, ville) values(:nom, :prenom, :adresse, :cp, :ville)");
        $this->select = $db->prepare("select nom, prenom from Utilisateur order by prenom");
    }
    public function insert($nom, $prenom, $adresse, $cp, $ville){
        $this->insert->execute(array(':nom'=> $nom, ':prenom'=> $prenom, ':adresse'=> $adresse, ':cp'=> $cp, ':ville'=> $ville));
        if($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo());            
        }        
    }
    public function select(){
        $this->select->execute();
        if($this->select->errorCode()!=0){
            print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();
    }
}