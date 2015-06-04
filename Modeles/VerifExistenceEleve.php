<?php
 function VerifExistenceEleve($pseudo, $motdepasse) 
 {
  $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014"); 
   $sth = $db->prepare('SELECT count(*) AS total FROM Eleve WHERE Pseudonyme = :pseudo AND MotdePasse = :motdepasse');
   $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
   $sth->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
   $sth->execute();

   foreach($sth as $st)
   {
       if($st['total'] == 0){
           return false;
       }
       else
       {
           return true;
       }
   }
}

function GetEleve ($pseudo, $motdepasse ) 
{
    
    
    $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");
    $Eleve = $db->prepare('SELECT Identifiant FROM Eleve WHERE Pseudonyme = :pseudo AND MotdePasse = :motdepasse');
    $Eleve->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $Eleve->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
    $Eleve->execute();
    
    foreach ($Eleve  as $eleve ){        
       $identifiant= $eleve['Identifiant'];
       return $identifiant;
    }
}
