<?php

$routes = array(

    // Main
    'IndexMain' => array('nom' => 'IndexMain', 'header' => 'HeaderIndex', 'footer' => 'Footer', 'controleur' => null, 'model' => '', 'vue' => 'IndexMain', 'js' => '', 'bdd' => 'BDD', 'visible' => true, 'active' => true),

    //User
    'Login' => array('nom' => 'Login', 'header' => 'HeaderIndex', 'footer' => 'Footer', 'controleur' => null, 'model' => 'Login', 'vue' => 'LoginView', 'js' => '', 'bdd' => 'BDD', 'visible' => true, 'active' => true),
    'Inscription' => array('nom' => 'Inscription', 'header' => 'HeaderIndex', 'footer' => 'Footer', 'controleur' => null, 'model' => 'Inscription', 'vue' => 'InscriptionView', 'js' => '', 'bdd' => 'BDD', 'visible' => true, 'active' => true),
    'Deconnection'=> array('nom' => 'Deconnection' ,'header'=> null,'controleur'=> null, 'model' => 'Deconnection', 'vue' => null, 'js' => null,'bdd' => 'BDD' , 'visible' => true, 'active' => true),

    //Login path
    'Temporaire' => array('nom' => 'Temporaire', 'header' => 'HeaderIndex', 'footer' => 'Footer', 'controleur' => null, 'model' => '', 'vue' => 'TemporaireView', 'js' => '', 'bdd' => '', 'visible' => true, 'active' => true),
    'IndexGCompte' => array('nom' => 'IndexGCompte', 'header' => 'HeaderGCompte', 'footer' => '', 'controleur' => null, 'model' => 'CIndex', 'vue' => 'CIndexView', 'js' => '', 'bdd' => '', 'visible' => true, 'active' => true),
    'IndexGDemat' => array('nom' => 'IndexGDemat', 'header' => 'HeaderGDemat', 'footer' => '', 'controleur' => null, 'model' => 'DIndex', 'vue' => 'DIndexView', 'js' => 'DIndexJS', 'bdd' => '', 'visible' => true, 'active' => true),
    'IndexManageur' => array('nom' => 'IndexManageur', 'header' => 'HeaderMIndex', 'footer' => '', 'controleur' => null, 'model' => 'MIndex', 'vue' => 'MIndexView', 'js' => 'MIndexJS', 'bdd' => '', 'visible' => true, 'active' => true),

    //Gestionnaire Compte
    'HistoriqueGCompte' => array('nom' => 'HistoriqueGCompte', 'header' => 'HeaderGCompte', 'footer' => '', 'controleur' => null, 'model' => 'CHistorique', 'vue' => 'CHistoriqueView', 'js' => 'CHistoriqueJS', 'bdd' => '', 'visible' => true, 'active' => true),
    'MonCompteGCompte' => array('nom' => 'MonCompteGCompte', 'header' => 'HeaderGCompte', 'footer' => '', 'controleur' => null, 'model' => 'CMonCompte', 'vue' => 'CMonCompteView', 'js' => '', 'bdd' => '', 'visible' => true, 'active' => true),
    'ModifDemandeGCompte' => array('nom' => 'ModifDemandeGCompte', 'header' => 'HeaderGCompte', 'footer' => '', 'controleur' => null, 'model' => 'CModifDemande', 'vue' => 'CModifDemandeView', 'js' => '', 'bdd' => '', 'visible' => true, 'active' => true),

    //Gestionnaire Demat
    'CompteGDemat' => array('nom' => 'CompteGDemat', 'header' => 'HeaderGDemat', 'footer' => '', 'controleur' => null, 'model' => 'DCompte', 'vue' => 'DCompteView', 'js' => '', 'bdd' => '', 'visible' => true, 'active' => true),
    'TableauGDemat' => array('nom' => 'TableauGDemat', 'header' => 'HeaderGDemat', 'footer' => '', 'controleur' => null, 'model' => 'DTableau', 'vue' => 'DTableauView', 'js' => 'CHistoriqueJS', 'bdd' => '', 'visible' => true, 'active' => true),
    'MesDemandesGDemat' => array('nom' => 'MesDemandesGDemat', 'header' => 'HeaderGDemat', 'footer' => '', 'controleur' => null, 'model' => 'DMesDemandes', 'vue' => 'DMesDemandesView', 'js' => 'CHistoriqueJS', 'bdd' => '', 'visible' => true, 'active' => true),
    'HistoriqueGDemat' => array('nom' => 'HistoriqueGDemat', 'header' => 'HeaderGDemat', 'footer' => '', 'controleur' => null, 'model' => 'DHistorique', 'vue' => 'DHistoriqueView', 'js' => 'DHistoriqueJS', 'bdd' => '', 'visible' => true, 'active' => true),

    //Manageur
    'ExtractionManageur' => array('nom' => 'ExtractionManageur', 'header' => 'HeaderMIndex', 'footer' => '', 'controleur' => null, 'model' => 'MExtraction', 'vue' => 'MExtractionView', 'js' => '', 'bdd' => '', 'visible' => true, 'active' => true),
    'EquipeManageur' => array('nom' => 'EquipeManageur', 'header' => 'HeaderMIndex', 'footer' => '', 'controleur' => null, 'model' => 'MEquipe', 'vue' => 'MEquipeView', 'js' => '', 'bdd' => '', 'visible' => true, 'active' => true),
);
?>
