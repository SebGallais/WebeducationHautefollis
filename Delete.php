<?php
session_start();
$conn_id = ftp_connect("172.16.2.242", 21);
ftp_login($conn_id, $_SESSION['login'] ,$_SESSION['pwd']);
ftp_pasv($conn_id, true);

if( $_SESSION['chdir'] == "directory")
{ 
    $fichier  = $_GET['DeleteFile'];
    ftp_delete($conn_id , $fichier );
    header ('location: PersonalDoc.php');
}
else
{
    $fichier  = $_GET['DeleteFile'];
    ftp_delete($conn_id , $fichier );
    
    $chemin  = $_SESSION['chdir'];
    header ('location: PersonalDoc.php?chdir='.$chemin);
 
}


?>