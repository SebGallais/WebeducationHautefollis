<?php 
session_start();

$conn_id = ftp_connect("172.16.2.242", 21);
ftp_login($conn_id, $_SESSION['login'] ,$_SESSION['pwd']);
ftp_pasv($conn_id, true);

if( $_SESSION['chdir'] == "directory")
    {
        
        $fichier=  $_GET['DLFile'];
        ftp_get($conn_id,"$fichier", "$fichier" , FTP_ASCII); 
        header('Content-Disposition: attachment; filename="'.$fichier.'"');
        readfile($fichier);
        unlink($fichier);
        
    }
    else
    {
       $nbrocc = substr_count($_GET['DLFile'], '/');
       $FichierTemporaire = explode('/', $_GET['DLFile']);
       $fichier =  $FichierTemporaire[$nbrocc];
       
       $chemin  = $_SESSION['chdir'];
       ftp_get($conn_id,  "$fichier", $chemin.$fichier , FTP_ASCII); 
       header('Content-Disposition: attachment; filename="'.$fichier.'"');
       readfile($fichier);
       unlink($fichier);
    }

?>
