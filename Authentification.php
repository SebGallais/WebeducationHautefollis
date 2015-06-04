<!DOCTYPE html>
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Lycée Haute-Follis - Webeducation</title>
	<meta charset="utf-8" />
	<script type="text/javascript" src="commun/jquery-1.5.1.min.js"></script>
	<script type="text/javascript" src="commun/jquery-ui-1.8.13.custom.min.js"></script>
	<script type="text/javascript" src="commun/jquery.lightbox.js"></script>
	<script type="text/javascript" src="commun/common.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="CSS/styles.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="CSS/rte.css" />
	<link rel="stylesheet" type="text/css" media="print" href="CSS/print.css" />
        <link rel="stylesheet" type="text/css" href="../commun/jquery.lightbox.css" />
        <script type="text/javascript" src="jquery.lightbox.js"></script>
        <script type="text/javascript">
            $(document).ready(function($){$('.lightbox').lightbox();});
        </script>
    </head>
    <body class="normal">
	<div id="blueline"></div>
	<div id="wrapper">
            <div id="header">
            <div id="search"></div>
            <h1 class="farfaraway">Lycée Haute-Follis - Webeducation</h1> 
            <a title="Retour à l'accueil" href="http://www.lhf53.eu/"><img src="commun/Images/Fond/logo.png" alt="Logo du lycée" /></a>
            <p id="title">Espace Numérique.</p>
            <div class="clear"></div>
            </div>
<!-- Début image du haut -->
            <div id="img_page" style="background-image: url('commun/Images/Fond/recherche.png');"></div>
<!-- Fin image du haut -->
            <div id="content">
                <div id="bloc_all" align="center">
                    <form method="POST" action="Authentification.php" >                     
                        <a>Identifiant :  <input id="Login" name="Login" type="text"/></a><br/>
                        <a>Mot de passe : <input id="Password" name="Password" type="password"/></a><br/>
                        <input id="Se_Connecter" name="Se Connecter" type="submit"/>
                    </form>
                    <a id="MDPForget" name="MDPForget" href="index.php">Mot de passe oubier</a>
                </div>
            <div id="footer">
                    © Haute-Follis
            </div>
	  </div>
        </div>
    </body>
</html>
<?php
$logintemp = null;
$password = null;
if (isset($_POST['Login']) && isset($_POST['Password']))
  {	   
    $logintemp =  $_POST['Login'];
    $password = $_POST['Password'];
  }
if(( $ftp = ftp_connect("172.16.2.242", 21)) && (ftp_login($ftp,$login,$password)))
{
    session_start ();
   $_SESSION['login'] = $logintemp;
    $_SESSION['pwd'] = $password;

   header ('location: PersonalDoc.php');
	}
	else {
		echo '<body onLoad="alert(\'Identifiant ou Mot de passe incorrect...\')">';
		echo '<meta http-equiv="refresh" content="0;URL=Authentification.php">';
	}




?>

