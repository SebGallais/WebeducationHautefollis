<?php
include_once('../Modeles/VerifExistenceEleve.php');
$pseudo = null;
$password = null;



if (isset($_POST['Login']))
{
      $pseudo =  $_POST['Login'];   
}
if (isset($_POST['Password']))
{
      $password =  $_POST['Password'];   
}


 if ( VerifExistenceEleve($pseudo, $password) == true ){
     
     session_start();
      $_SESSION["IdentifiantEleve"] = GetEleve($pseudo, $password);
      header ('location: ../Controleur/Note.php'); 
     
 }

include_once('../Vues/AuthentificationNote.php');
?>

