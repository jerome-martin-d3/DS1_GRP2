<?php

class Actu{
    private $db;
    private $insert;
    private $select;
    
    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("insert into actualite(titre, contenu, idUtilisateur) values(:titre, :contenu, :idUtil)");
        $this->select = $db->prepare("select * from actualite");
    }
    public function insert($titre, $contenu, $idUtil){
        $this->insert->execute(array(':titre'=> $titre, ':contenu'=> $contenu, ':idUtil'=> $idUtil));
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