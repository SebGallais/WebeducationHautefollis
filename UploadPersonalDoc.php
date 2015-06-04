<?php 
//démarré la session
session_start();


//On se connecte au serveur ftp
$conn_id = ftp_connect("172.16.2.242", 21);
ftp_login($conn_id, $_SESSION['login'] ,$_SESSION['pwd']);
ftp_pasv($conn_id, true);


//on récupéré le fichier à uploadé
$fichier  = $_FILES['file']['name'];
$cheminfichier =$_FILES['file']['tmp_name'];
//on récupère le chemin 

$chemin  = $_SESSION['chdir'];


    //upload si le chemin indiqué  est la racine
    if( $_SESSION['chdir'] == "directory")
    {
        
      move_uploaded_file( $cheminfichier , "$fichier");  
      ftp_put($conn_id, "/$fichier" , $fichier, FTP_BINARY);
      unlink($fichier);
       header ('location: PersonalDoc.php');
      		
   }

    //si ce n'est pas la racine uploadé en lui indiquant le chemin avant
    else
    {
        move_uploaded_file( $cheminfichier , "$fichier");
        ftp_put($conn_id,  $chemin.$fichier ,$fichier , FTP_BINARY);
        unlink($fichier);
        header ('location: PersonalDoc.php?chdir='.$chemin);
    }
    
    

?>
