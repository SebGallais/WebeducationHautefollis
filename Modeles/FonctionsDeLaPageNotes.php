<?php
function GetNoteParMatiere ($identifiantEleve, $identifiantMatiere) {
    $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");  
  $Notes = $db->prepare("SELECT Libelle, Valeur, Coefficient FROM Note WHERE Identifiant_Eleve = :IdEleve AND Identifiant_Matiere = :IdMatiere");
  $Notes->bindValue(':IdEleve', $identifiantEleve, PDO::PARAM_STR);
  $Notes->bindValue(':IdMatiere', $identifiantMatiere, PDO::PARAM_STR);
  $Notes->execute();

  return $Notes;
  
 } 
 
function GetMoyenneGenerale($identifiantEleve){
     
   $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");  
   $Notes = $db->prepare("SELECT  Valeur, Coefficient FROM Note WHERE Identifiant_Eleve = :IdEleve "); 
   $Notes->bindValue(':IdEleve', $identifiantEleve, PDO::PARAM_STR);
   $Notes->execute();    
   $total =0;
   
   foreach ($Notes as $note){
       
       
     $coeffetnote =  $note['Valeur'] * $note['Coefficient'];
     $total = $total + $coeffetnote;
     
          
   }
   if(NbrNotesEleve($identifiantEleve) != 0){
    return $total/NbrNotesEleve($identifiantEleve);
   }
   else{
       return 0;
   }
   
     
     
 }
function NbrNotesEleve($identifiantEleve){
     
   $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");  
   $Nombre = $db->prepare('SELECT Coefficient  FROM Note WHERE Identifiant_Eleve = :IdEleve');    
   $Nombre->bindValue(':IdEleve', $identifiantEleve, PDO::PARAM_STR); 
   $Nombre->execute();
   $total = 0;
   foreach ($Nombre as $nombre){      
     
   $total = $total + $nombre['Coefficient'] ;     
   }
   
   return $total;
 }
 
function GetMoyenneParMatiere($IdentifiantEleve, $IdentifiantMatiere){
    
         
   $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");  
   $Notes = $db->prepare("SELECT  Valeur, Coefficient FROM Note WHERE Identifiant_Eleve = :IdEleve AND Identifiant_Matiere = :IdMatiere "); 
   $Notes->bindValue(':IdMatiere', $IdentifiantMatiere, PDO::PARAM_STR);
   $Notes->bindValue(':IdEleve', $IdentifiantEleve, PDO::PARAM_STR);
   $Notes->execute();    
   $total =0;
   
   foreach ($Notes as $note){
       
       
     $coeffetnote =  $note['Valeur'] * $note['Coefficient'];
     $total = $total + $coeffetnote;
     
          
   }
   if(NbrNotesEleveMatiere($IdentifiantEleve,$IdentifiantMatiere ) != 0){
    return $total/NbrNotesEleveMatiere($IdentifiantEleve, $IdentifiantMatiere);
   }
   else{
       return 0;
   }

}
function NbrNotesEleveMatiere($IdentifiantEleve, $IdentifiantMatiere){
     
   $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");  
   $Nombre = $db->prepare('SELECT Coefficient  FROM Note WHERE Identifiant_Eleve = :IdEleve AND Identifiant_Matiere = :IdMatiere ');    
   $Nombre->bindValue(':IdMatiere', $IdentifiantMatiere, PDO::PARAM_STR);
   $Nombre->bindValue(':IdEleve', $IdentifiantEleve, PDO::PARAM_STR); 
   $Nombre->execute();
   $total = 0;
   foreach ($Nombre as $nombre){      
     
   $total = $total + $nombre['Coefficient'] ;     
   }
   
   return $total;
 }
 
function  GetMoyenneParMatiereClasse($IdentifiantMatiere, $IdentifiantClasse){
    
           
   $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");  
   $Notes = $db->prepare("SELECT  Valeur, Coefficient FROM Note WHERE Identifiant_Classe = :IdClasse AND Identifiant_Matiere = :IdMatiere "); 
   $Notes->bindValue(':IdMatiere', $IdentifiantMatiere, PDO::PARAM_STR);
   $Notes->bindValue(':IdClasse', $IdentifiantClasse, PDO::PARAM_STR);
   $Notes->execute();    
   $total =0;
   
   foreach ($Notes as $note){
       
       
     $coeffetnote =  $note['Valeur'] * $note['Coefficient'];
     $total = $total + $coeffetnote;
     
          
   }
   if(NbrNotesParMatiereClasse($IdentifiantMatiere,$IdentifiantClasse ) != 0){
    return $total/NbrNotesParMatiereClasse($IdentifiantMatiere, $IdentifiantClasse);
   }
   else{
       return 0;
   }  
    
    
}
function  NbrNotesParMatiereClasse($IdentifiantMatiere, $IdentifiantClasse){
    
 $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");  
   $Nombre = $db->prepare('SELECT Coefficient  FROM Note WHERE Identifiant_Classe = :IdClasse AND Identifiant_Matiere = :IdMatiere ');    
   $Nombre->bindValue(':IdMatiere', $IdentifiantMatiere, PDO::PARAM_STR);
   $Nombre->bindValue(':IdClasse', $IdentifiantClasse, PDO::PARAM_STR); 
   $Nombre->execute();
   $total = 0;
   foreach ($Nombre as $nombre){      
     
   $total = $total + $nombre['Coefficient'] ;     
   }
   if($total == 0){
       return 0;
   }
   else{  
       return $total;
   }    
}

function GetClasseDeEleve($IdentifiantEleve){
    $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");
    $Classe = $db->prepare("SELECT IdentifiantClasse FROM Eleve WHERE Identifiant = :IdEleve ");
    $Classe->bindValue(':IdEleve', $IdentifiantEleve, PDO::PARAM_STR);
    $Classe->execute();
    foreach ($Classe as $classe){

      return  $classe['IdentifiantClasse'];
   
   }  
}

function GetMoyenneClasse($identifiantClasse){
    
  $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");  
   $Notes = $db->prepare("SELECT  Valeur, Coefficient FROM Note WHERE Identifiant_Classe = :IdClasse "); 
   $Notes->bindValue(':IdClasse', $identifiantClasse, PDO::PARAM_STR);
   
   $Notes->execute();    
   $total =0;
   
   foreach ($Notes as $note){    
     $coeffetnote =  $note['Valeur'] * $note['Coefficient'];
     $total = $total + $coeffetnote;     
   }
   if(NbrNotesClasse($identifiantClasse) != 0){
    return $total/NbrNotesClasse($identifiantClasse);
   }
   else{
       return 0;
   }   
  
}
function NbrNotesClasse($IdentifiantClasse){
    
    $db = new PDO("sqlsrv:Server=localhost;Database=SaisieNoteHF", "sa", "sql2014");  
   $Nombre = $db->prepare('SELECT Coefficient  FROM Note WHERE Identifiant_Classe = :IdClasse ');    
   $Nombre->bindValue(':IdClasse', $IdentifiantClasse, PDO::PARAM_STR); 
   $Nombre->execute();
   $total = 0;
   foreach ($Nombre as $nombre){      
     
   $total = $total + $nombre['Coefficient'] ;     
   }
   if($total == 0){
       return 0;
   }
   else{  
       return $total;
   } 
    
    
    
    
}

