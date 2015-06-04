<!DOCTYPE html>
<html   xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta charset="iso-8859-1">
        <title>Intranet-HauteFollis</title>
        
        <link href="mystyle.css" rel="stylesheet">
            
         
    </head>
  
    
<body>
    
    <div class="blueline"/>    
<?php
ini_set("display_errors",0);error_reporting(0);
session_start();

if ( $_SESSION['login'] != null || $_SESSION['pwd'] != null ) {
   

$ftp = ftp_connect("172.16.2.242", 21) ;
ftp_login($ftp,  $_SESSION['login'], $_SESSION['pwd']);
ftp_pasv($ftp, true);

if(isset($_GET['chdir'] ))
{
    $_SESSION['chdir'] = $_GET['chdir'];
    
    echo'<table class="tableau1">'
        . '<tr> '
            . '<td class="case1" > <a href="http://www.lhf53.eu/"  ><img src="commun/Images/Fond/logo.png" alt="Logo du lycée" /> </a></td>'
            . '<td class="case2" ><b>'. $_GET['chdir'].'</b></td>'
             .'<td class="case3" ><a href="Deconnexion.php"><img src="commun/Images/Icons/deconnexion.png" alt="Logo du lycée"</a></td>'
        . '</tr>'       
    . '</table>';

            ?>
   <table style="height: 50px ">
            <tr>
                <td style="width:60%;text-align:center">
                    <input style="width:280px;height:30px" type="button" value="Retour a l'espace Numerique" onClick="javascript:document.location.href='Documents.php'" />
                </td>   
                <td style="width:40%;text-align:center;">
                    <form method="post" action="UploadPersonalDoc.php" enctype="multipart/form-data" >
                        Fichier : 
                        <input type="file" name="file"/>
                        </br>
                        <input  style="width:280px;height:30px;"type="submit" name="Submit" value="Envoyer" /> 
                    </form>  
                </td> 
            </tr>   
        </table>       
 
<?php 
    lister($ftp,  $_GET['chdir']);
}
else
{
    $_SESSION['chdir'] = "directory";
    $ch = explode('.', $_SESSION['login']);
    
    echo'<table class="tableau1">'
        . '<tr> '
           . '<td class="case1"> <a href="http://www.lhf53.eu/"> <img src="commun/Images/Fond/logo.png" alt="Logo du lycée" /> </a></td>'
            . '<td class="case2"><b>'. $ch[0] .' '. $ch[1] .'</b></td>'
             .'<td class="case3" ><a href="Deconnexion.php"><img src="commun/Images/Icons/deconnexion.png" alt="Logo du lycée"</a></td>'
        
        . '</tr>'
    .'</table>';   
                ?>
   <table style="height: 50px ">
            <tr>
                <td style="width:60%;text-align:center">
                    <input style="width:280px;height:30px" type="button" value="Retour a l'espace Numerique" onClick="javascript:document.location.href='Documents.php'" />
                </td>  
                <td style="width:40%;text-align:left">
                    <form method="post" action="UploadPersonalDoc.php" enctype="multipart/form-data" >
                        Fichier : 
                        <input type="file" name="file"/>
                        </br>
                        <input  style="width:280px;height:30px;"type="submit" name="Submit" value="Envoyer" /> 
                    </form>  
                </td> 
            </tr>   
        </table>       
 
<?php 
    lister($ftp,'.');  

}  


if(isset($_GET['change'] )){
    ftp_cdup($ftp);
}

if(isset($_GET['suppr'] )){
    ftp_cdup($ftp);
}

ftp_close($ftp);
}
else
{
    header ('location: index.php');
    
}



function lister($ftp,$repertoire){

    function ftp_is_dir($folder) 
    {
        global $ftp;
        if (@ftp_chdir($ftp, $folder)) {
           ftp_chdir($ftp, '..');
           return true;
        } 
        else 
        {
           return false;
        }
    }

$result = ftp_nlist($ftp, $repertoire );

if ($result == null){
    
    echo '</br>';
    echo '<h1>'
    .''.utf8_decode("Dossier vide.").''
     . '</h1>'
     .'<meta http-equiv="refresh" content="5;PersonalDoc.php" />';
          
}else {


echo'<table  class="tableau2"> ';
echo'</br>';
          echo  '<tr class="ligne1">'
                    . '<td class="case1" ></td>'
                    . '<td class="case2" ><a href="PersonalDoc.php?change=nom">...</a></td>'
                    . '<td class="case3">Nom</td>'
                    . '<td class="case4">Taille</td>'
                    . '<td class="case5">Derniere Modification</td>'
                . '</tr>';
}


 foreach($result as $file) {
     
$avant = array("é", "è"  );
$apres = array("%e9" ,"`%e8" );
     
$chdwl= explode('\\', $_SESSION['login']);
$ftp_user_name = $chdwl[0];
$ftp_user_pass = $_SESSION['pwd']; 
$chaineconnexion = $_SESSION['login'];

if ($file!='.'&&$file!='..') 
{
     If ($i == 0){ 
            if (ftp_size($ftp,$file) < 0 ) 
            {
               echo '<tr  class="ligne2" style="Background-Color:#D8DBDF">'
                        . '<td style="Background-Color:#FFFFFF"></td>'
                        . '<td class="case1"><img src="commun/Images/Icons/folder.png" alt="Logo du lycée" /></td>'
                        . '<td class="case2"> <b><a  style="text-decoration:none;color:#000" href="PersonalDoc.php?chdir='.$file.'/">'.$file.'</a></b></td>'
                        . '<td class="case2"></td>'
                        . '<td class="case2"></td>'
                   .'</tr>';
            }
            else
            {
                  echo '<tr  class="ligne3" style="Background-Color:#D8DBDF"> '
                        . '<td class="case1" style="Background-Color:#FFFFFF">'
                          . '<a  '
                               . 'href="Delete.php?DeleteFile='.$file.'"'
                               . 'onclick="if (window.confirm(\'Etes-vous sur de vouloir supprimer ce fichier ?\')) {return true;} else {return false;}">'
                               . '<img src="commun/Images/Icons/corbeille.png" alt="Logo du lycée" />'

                          .'</a>'
                        . '</td>'

                        . '<td class="case2"><img src="commun/Images/Icons/fichier.png" alt="Logo du lycée" /></td>'
                        . '<td class="case3" > <a style="text-decoration:none;color:#000"   href="DownloadPersonalDoc.php?DLFile='. $file .'" >'.$file.'</a></td> '
                        . '<td class="case4">' . formatSizeUnits(ftp_size( $ftp ,  $file )).'</td> '
                        . '<td class="case4">'. date("d/m/Y H:i", ftp_mdtm($ftp, $file)) .'</td>'
                      .'</tr>';
            }
          }
          else if ($i == 1){ 
            if (ftp_size($ftp,$file) < 0 ) 
            {
               echo '<tr  class="ligne2" style="Background-Color:#A3ADC0">'
                        . '<td style="Background-Color:#FFFFFF"></td>'
                        . '<td class="case1"><img src="commun/Images/Icons/folder.png" alt="Logo du lycée" /></td>'
                        . '<td class="case2"> <b><a  style="text-decoration:none;color:#000" href="PersonalDoc.php?chdir='.$file.'/">'.$file.'</a></b></td>'
                        . '<td class="case2"></td>'
                        . '<td class="case2"></td>'
                   .'</tr>';
            }
            else
            {
                  echo '<tr  class="ligne3" style="Background-Color:#A3ADC0"> '
                        . '<td class="case1" style="Background-Color:#FFFFFF">'
                          . '<a  '
                               . 'href="Delete.php?DeleteFile='.$file.'"'
                               . 'onclick="if (window.confirm(\'Etes-vous sur de vouloir supprimer ce fichier ?\')) {return true;} else {return false;}">'
                               . '<img src="commun/Images/Icons/corbeille.png" alt="Logo du lycée" />'

                          .'</a>'
                        . '</td>'

                        . '<td class="case2"><img src="commun/Images/Icons/fichier.png" alt="Logo du lycée" /></td>'
                        . '<td class="case3" > <a style="text-decoration:none;color:#000"   href="DownloadPersonalDoc.php?DLFile='. $file .'" >'.$file.'</a></td> '
                        . '<td class="case4">' . formatSizeUnits(ftp_size( $ftp ,  $file )).'</td> '
                        . '<td class="case4">'. date("d/m/Y H:i", ftp_mdtm($ftp, $file)) .'</td>'
                      .'</tr>';
            }
          }
          If ($i == 0){
              $i = 1;
          }
          else{
              $i = 0;
          }
        
}
}
echo'</table>';

}
  function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
        
}
?>    
   <div>   
              <table style="margin-top:0.5%;height: 130px ">
            <tr>
                <?php
                
                $chemin = $_GET['chdir'];
                if(isset($_GET['chdir'] ))
                {
                ?>
                  <td style="width:100%;text-align:center">
                  <input style="width:350px;height:50px" type="button" value="Retour en haut de page" onClick="javascript:document.location.href='PersonalDoc.php?chdir=<?php echo $chemin; ?>' "/>
                  </td>    
                <?php 
               }else
               {
               ?>
                  <td style="width:100%;text-align:center">
                  <input style="width:280px;height:30px" type="button" value="Retour en haut de page" onClick="javascript:document.location.href='PersonalDoc.php' "/>
                  </td>'    
                <?php 
               }
                 ?>  
                  
            </tr>   
        </table> 
    </div>
</body>
</html>