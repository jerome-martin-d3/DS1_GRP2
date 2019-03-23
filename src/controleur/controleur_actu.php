<?php

function actionAjoutActu($twig, $db){
    $util = new Utilisateur($db);
    $utilisateurs = $util->selectOrderID();
    if (isset($_POST['btAjoutActu'])){
        $actu = new Actu($db);
        
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $idUtil = $_POST['idUtil'];
        
        $actu->insert($titre, $contenu, $idUtil);
      
    }
    echo $twig->render('ajout-actu.html.twig', array('utilisateurs'=>$utilisateurs));
}

