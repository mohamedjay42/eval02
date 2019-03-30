<?php

$aData = [
    ['prenom' => 'Louise',  'note' => 16],
    ['prenom' => 'Emma',    'note' => 18],
    ['prenom' => 'Gabriel', 'note' => 5],
    ['prenom' => 'Jules',   'note' => 11],
    ['prenom' => 'Alice',   'note' => 2],
    ['prenom' => 'Manon',   'note' => 12],
    ['prenom' => 'Emma',    'note' => 13],
    ['prenom' => 'Arthur',  'note' => 0],
    ['prenom' => 'Lucas',   'note' => 15],
    ['prenom' => 'Louis',   'note' => 10],
    ['prenom' => 'Hugo',    'note' => 9]
];

if ($argc != 2) {
    die("Erreur paramètres: " . $argv[0] . " <numéro exercice>");
}

$nNumExercice = $argv[1] ?? 0;
if ( ($nNumExercice>0) && ($nNumExercice<=10) ) {
    $sFonction = "exercice" . sprintf("%02d", $nNumExercice);
    if ( function_exists($sFonction) ) {
        $sFonction();
    } else {
        die( "fonction " . $sFonction . " non implémentée");
    }
} else {
    die("exercice $nNumExercice inexistant");
}

/*
Consignes habituelles (git, coding standards...)
soignez l'organisation du programme: utilisez des fonctions, séparez votre code en plusieurs fichiers
Utiliser le design pattern MVC
Gérer toutes les erreurs qui pourraient survenir pendant l'éxécution (accès à un fichier inexistant, execution correcte des requetes SQL...)
Votre code devra être livré sur un repo github

1 - créer une fonction pour ajouter un élève dans le tableau $aData
    exemple d'appel ajouterEleve( ['prenom'=>'Marie', 'note'=>14] )
2 - Créer une fonction pour lire la note d'un élève
    exemple d'appel lireNote( 'Emma' )
3 - Créer une fonction pour supprimer un élève dans le tableau $aData
    exemple d'appel supprimerEleve( 'Gabriel' )
4 - Créer une fonction pour modifier la note d'un élève
    exemple d'appel modifierNote( 'Manon', 12 )
5 - Ecrire les données du tableau $aData dans un fichier csv nommé "resultat_exam.csv"
6 - Créer une table 'resultat_exam' dans une database 'exercices' permettant de stocker les données de l'exercice.
    Créer la base de données, l'utilisateur se connectant à la base et ses droits d'accès avec phpMyAdmin
    Créer la table automatiquement grace à une fonction PHP, si la table existait la supprimer.
    Il est indispensable de créer les index utiles pour les requetes que vous utiliserez (clé primaire et autres index)
    Lire la configuration de la base de données à partir d'un fichier json "config-db.json"
7 - Lire le fichier csv puis enregistrer les données dans la table 'resultat_exam'
    Controler la validité des données que vous intégrez dans la table
    Controler l'unicité des données insérées
8 - Afficher la moyenne de la classe, la note mini, la note maxi
    ces données proviendront des fonctions suivantes: getMoyenneClasse(), getNoteMini(), getNoteMaxi()
9 - Lire la table 'resultat_exam' puis afficher les résultats dans l'ordre descendant des notes obtenues  formatés comme ci-dessous
10 - Lire la table 'resultat_exam' puis afficher les résultats dans l'ordre alphabétique formatés comme ci-dessous

Mise en forme affichage:

        Meilleure note : 99
        Note mini:       99
        Moyenne classe:  99.99

**************************************************************
* Prénom          * Note * Commentaire                       *
**************************************************************
* AAAAAAAAAAAAAAA *  NN  * CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC *
**************************************************************

Le champ commentaire contient:
    "Reçu a l'examen" si l'élève a la moyenne
    "Examen échoué" sinon
*/
