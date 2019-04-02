<?php

function ajouterEleve($aEleve) {
  global $aData;
  array_push($aData,$aEleve);

}

function lireNote($eleve) {
  global $aData;
  foreach($aData as $value) {
    if ($value['prenom'] == $eleve) {
      echo $value['note']."\n";
    }
  }
}

function supprimerEleve($eleve) {
  global $aData;

  foreach ($aData as $key => $value) {
    if ($value['prenom'] == $eleve) {
      unset($aData[$key]);
    }
  }

}

function creerCsv() {
  global $aData;
  $fichier_csv = fopen('resultat_exam.csv','w');
  foreach($aData as $lignes => $ligne) {
    fputcsv($fichier_csv,$ligne);
  }
  fclose($fichier_csv);
}
