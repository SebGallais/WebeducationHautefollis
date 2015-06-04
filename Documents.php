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
<script type="text/javascript" src="jquery.lightbox.js"></script><script type="text/javascript">
            $(document).ready(function($){
            $('.lightbox').lightbox();
        });
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
                    <a href="Deconnexion.php"><img src="commun/Images/Icons/Deconextion.ico.png" width="130" height="130" border="0"></a>
                    <a href="PersonalDoc.php"><img src="commun/Images/Icons/Mes_Document.ico.png" width="150" height="150" border="0"></a>
               
                    
                    
                    <?php
                     session_start();

                    if($_SESSION['login'] == null || $_SESSION['pwd'] == null ) {
                     header ('location: index.php');             
                    }
                    ?>
                         
                                    
                    </div>
		<div id="footer">
			© Haute-Follis
		</div>

	  </div>
</div>
</body>
</html>


