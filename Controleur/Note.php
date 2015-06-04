<?php
include_once('../Modeles/FonctionsDeLaPageNotes.php');
session_start();
if($_SESSION["IdentifiantEleve"]== null){
    
    header('location: ../index.php');
    
}

$identifiantEleve = $_SESSION["IdentifiantEleve"];




 
$NotesdeMaths       = GetNoteParMatiere( $identifiantEleve,1 );
$NotesdAnglais      = GetNoteParMatiere( $identifiantEleve,2 );
$NotesdeFrançais    = GetNoteParMatiere( $identifiantEleve,3 );
$NotesdeSciences    = GetNoteParMatiere($identifiantEleve,4 );
$NotesdeSport       = GetNoteParMatiere( $identifiantEleve,5 );
$NotesdHistoireGeo  = GetNoteParMatiere( $identifiantEleve,6 );
$NotesdePhilosophie = GetNoteParMatiere( $identifiantEleve,7 );

$MoyenneGeneral =  number_format(GetMoyenneGenerale($identifiantEleve),2);

$MoyennedeMaths       = number_format(GetMoyenneParMatiere($identifiantEleve,1 ),2);
$MoyennedAnglais      = number_format(GetMoyenneParMatiere( $identifiantEleve,2 ),2);
$MoyennedeFrançais    = number_format(GetMoyenneParMatiere($identifiantEleve,3 ),2);
$MoyennedeSciences    = number_format(GetMoyenneParMatiere( $identifiantEleve,4 ),2);
$MoyennedeSport       = number_format(GetMoyenneParMatiere( $identifiantEleve,5 ),2);
$MoyennedHistoireGeo  = number_format(GetMoyenneParMatiere( $identifiantEleve,6 ),2);
$MoyennedePhilosophie = number_format(GetMoyenneParMatiere( $identifiantEleve,7 ),2);

$classe = GetClasseDeEleve($identifiantEleve);

$MoyenneDeClasseMaths =  number_format(GetMoyenneParMatiereClasse(1, $classe),2);
$MoyenneDeClasseAnglais = number_format(GetMoyenneParMatiereClasse(2, $classe),2);
$MoyenneDeClasseFrançais =  number_format(GetMoyenneParMatiereClasse(3, $classe),2);
$MoyenneDeClasseSciences =  number_format(GetMoyenneParMatiereClasse(4, $classe),2);
$MoyenneDeClasseSport =  number_format(GetMoyenneParMatiereClasse(5, $classe),2);
$MoyenneDeClassedHistoireGeo =  number_format(GetMoyenneParMatiereClasse(6, $classe),2);
$MoyenneDeClassePhilosopie =  number_format(GetMoyenneParMatiereClasse(7, $classe),2);


$Moyenneclasse = number_format(GetMoyenneClasse($classe),2);


include_once('../Vues/Note.php');
?>