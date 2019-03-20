<?php

function actionAjoutUtil($twig, $db){
    if (isset($_POST['btAjoutUtil'])){
        $util = new Utilisateur($db);
        
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $cp = $_POST['cp'];
        
        $util->insert($nom, $prenom, $adresse, $cp, $ville);
      
    }
    echo $twig->render('ajout-util.html.twig', array());
}
