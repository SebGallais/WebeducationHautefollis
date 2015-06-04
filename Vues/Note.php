<html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Intranet-HauteFollis-Notes</title>
         <link href="../vues/mystyle.css" rel="stylesheet">
         <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
   
    
    <div class="titleNote">
      Consultation des notes<a style="margin-left: 15px" href="../Modeles/Deconnexion.php"><img src="../commun/Images/Icons/deconnexion.png" alt="Logo du lycée"></a>
      </div>


<body>
    
        
        <?php
//*************************************************************Maths************************************************************************ 
        ?>
    </br>
       <b><div class="titleMatiere"><b>Maths</b></div></b>
    <table class="table-bordered"    style="border-collapse: collapse" >
        <tr>
            <td  width="450px" height="30px" text-align="center"><b>Intitule de la note</b></td>  
            <td width="60px" height="30px" text-align="center"><b>Note</td>
            <td  width="90px" height="30px" text-align="center"><b>Coef</td>
        </tr>
    </table>    

           <?php
       
        foreach($NotesdeMaths as $Note){
       
       ?>
       
       <table class="table-striped" style="border-collapse: collapse" left="25%">
        <tr class="sucess">
            <td width="450px" height="30px" text-align="center"><?php echo $Note['Libelle'] ?></td>
            <td width="60px" height="30px" text-align="center" ><?php echo $Note['Valeur'] ?></td>
            <td width="90px" height="30px" text-align="center" ><?php echo $Note['Coefficient'] ?></td>
        </tr> 
        </table>
       <?php } ?>
        </br>
       <table class="table-bordered" style="border-collapse: collapse" left="25%">
        <td  width="180px" height="30px" text-align="center"> Moyenne de l'élève : <?php echo $MoyennedeMaths ?></td>
        <td  width="195px" height="30px" text-align="center"> Moyenne de la Classe : <?php echo $MoyenneDeClasseMaths ?></td>
        </table>
         </br>
      <?php
//*************************************************************Anglais************************************************************************  
      ?> 
       
       <div class="titleMatiere"><b>Anglais</b></div> 
           <table class="table-bordered"    style="border-collapse: collapse" >
        <tr>
            <td  width="450px" height="30px" text-align="center"><b>Intitule de la note</b></td>  
            <td width="60px" height="30px" text-align="center"><b>Note</td>
            <td  width="90px" height="30px" text-align="center"><b>Coef</td>
        </tr>
    </table>  
           <?php
       foreach($NotesdAnglais as $Note)
       {
       ?>
        <table class="table-striped" style="border-collapse: collapse" left="25%">
        <tr>
            <td  width="450px" height="30px" text-align="center"><?php echo $Note['Libelle'] ?></td>
            <td  width="60px" height="30px" text-align="center" ><?php echo $Note['Valeur'] ?></td>
            <td   width="90px" height="30px" text-align="center" ><?php echo $Note['Coefficient'] ?></td>
        </tr> 
        </table>
       <?php } ?>
       </br>
       <table class="table-bordered" style="border-collapse: collapse" left="25%">
        <td  width="180px" height="30px" text-align="center"> Moyenne de l'élève : <?php echo $MoyennedAnglais ?></td>
        <td  width="195px" height="30px" text-align="center"> Moyenne de la Classe : <?php echo $MoyenneDeClasseAnglais ?></td>
        </table>
       
       </br>
      
       <?php      
//*************************************************************Français************************************************************************  
     ?>   
       <div class="titleMatiere"><b>Français</b></div>
           <table class="table-bordered"    style="border-collapse: collapse" >
        <tr>
            <td  width="450px" height="30px" text-align="center"><b>Intitule de la note</b></td>  
            <td width="60px" height="30px" text-align="center"><b>Note</td>
            <td  width="90px" height="30px" text-align="center"><b>Coef</td>
        </tr>
    </table>  
           <?php
       foreach($NotesdeFrançais as $Note)
       {
       ?>
       <table class="table-striped" style="border-collapse: collapse" left="25%">
        <tr>
            <td  width="450px" height="30px" text-align="center"><?php echo $Note['Libelle'] ?></td>
            <td  width="60px" height="30px" text-align="center" ><?php echo $Note['Valeur'] ?></td>
            <td  width="90px" height="30px" text-align="center" ><?php echo $Note['Coefficient'] ?></td>
        </tr> 
        </table>
       <?php  }   ?> </br>
       <table class="table-bordered" style="border-collapse: collapse" left="25%">
        <td  width="180px" height="30px" text-align="center"> Moyenne de l'élève : <?php echo $MoyennedeFrançais ?></td>
        <td  width="195px" height="30px" text-align="center"> Moyenne de la Classe : <?php echo $MoyenneDeClasseFrançais ?></td>
        </table>
       
       </br>
       
       <?php      
//*************************************************************Sciences************************************************************************  
     ?>  
       <div class="titleMatiere"><b>Sciences</b></div>
           
           <table class="table-bordered"    style="border-collapse: collapse" >
        <tr>
            <td  width="450px" height="30px" text-align="center"><b>Intitule de la note</b></td>  
            <td width="60px" height="30px" text-align="center"><b>Note</td>
            <td  width="90px" height="30px" text-align="center"><b>Coef</td>
        </tr>
    </table>  
           <?php
       foreach($NotesdeSciences as $Note)
       {
       ?>
       <table class="table-striped" style="border-collapse: collapse" left="25%">
        <tr class="sucess">
            <td  width="450px" height="30px" text-align="center"><?php echo $Note['Libelle'] ?></td>
            <td  width="60px" height="30px" text-align="center" ><?php echo $Note['Valeur'] ?></td>
            <td  width="90px" height="30px" text-align="center" ><?php echo $Note['Coefficient'] ?></td>
        </tr> 
        </table>
       <?php } ?>
       </br>
       <table class="table-bordered" style="border-collapse: collapse" left="25%">
        <td  width="180px" height="30px" text-align="center"> Moyenne de l'élève : <?php echo $MoyennedeSciences ?></td>
        <td  width="195px" height="30px" text-align="center"> Moyenne de la Classe : <?php echo $MoyenneDeClasseSciences ?></td>
        </table>
       
       </br>
       <?php
//*************************************************************Sport************************************************************************  
       ?>
       <div class="titleMatiere"><b>Sport</b></div>
           <table class="table-bordered"    style="border-collapse: collapse" >
        <tr>
            <td  width="450px" height="30px" text-align="center"><b>Intitule de la note</b></td>  
            <td width="60px" height="30px" text-align="center"><b>Note</td>
            <td  width="90px" height="30px" text-align="center"><b>Coef</td>
        </tr>
    </table>  
           
           <?php
       foreach($NotesdeSport as $Note)
       {
       ?>
       <table class="table-striped" style="border-collapse: collapse" left="25%">
        <tr>
            <td  width="450px" height="30px" text-align="center"><?php echo $Note['Libelle'] ?></td>
            <td  width="60px" height="30px" text-align="center" ><?php echo $Note['Valeur'] ?></td>
            <td  width="90px" height="30px" text-align="center" ><?php echo $Note['Coefficient'] ?></td>
        </tr> 
        </table>
       <?php } ?>
        </br>
       <table class="table-bordered" style="border-collapse: collapse" left="25%">
        <td  width="180px" height="30px" text-align="center"> Moyenne de l'élève : <?php echo $MoyennedeSport ?></td>
        <td  width="195px" height="30px" text-align="center"> Moyenne de la Classe : <?php echo $MoyenneDeClasseSport ?></td>
        </table>
       
       </br>

       <?php 
//*************************************************************Histoire-Géographie************************************************************************  
       ?>
       
       <div class="titleMatiere"><b>Histoire-Géographie</b></div>
           <table class="table-bordered"    style="border-collapse: collapse" >
        <tr>
            <td  width="450px" height="30px" text-align="center"><b>Intitule de la note</b></td>  
            <td width="60px" height="30px" text-align="center"><b>Note</td>
            <td  width="90px" height="30px" text-align="center"><b>Coef</td>
        </tr>
    </table>  
           
           <?php
       foreach($NotesdHistoireGeo as $Note)
       {
       ?>
       <table class="table-striped" style="border-collapse: collapse" left="25%">
        <tr>
            <td  width="450px" height="30px" text-align="center"><?php echo $Note['Libelle'] ?></td>
            <td  width="60px" height="30px" text-align="center" ><?php echo $Note['Valeur'] ?></td>
            <td  width="90px" height="30px" text-align="center" ><?php echo $Note['Coefficient'] ?></td>
        </tr> 
        </table>
       <?php   }   ?> 
        </br>
       <table class="table-bordered" style="border-collapse: collapse" left="25%">
        <td  width="180px" height="30px" text-align="center"> Moyenne de l'élève : <?php echo $MoyennedHistoireGeo ?></td>
        <td  width="195px" height="30px" text-align="center"> Moyenne de la Classe : <?php echo $MoyenneDeClassedHistoireGeo ?></td>
        </table>
       
       </br>

       <?php
//*************************************************************Philosophie************************************************************************  
       ?>
       </br>
       <div class="titleMatiere"><b>philosophie</b></div>
           <table class="table-bordered"    style="border-collapse: collapse" >
        <tr>
            <td  width="450px" height="30px" text-align="center"><b>Intitule de la note</b></td>  
            <td width="60px" height="30px" text-align="center"><b>Note</td>
            <td  width="90px" height="30px" text-align="center"><b>Coef</td>
        </tr>
    </table>  
           <?php
       foreach($NotesdePhilosophie as $Note)
       {
       ?>
       <table class="table-striped" style="border-collapse: collapse" left="25%">
       <tr>
            <td  width="450px" height="30px"><?php echo $Note['Libelle'] ?></td>
            <td width="60px" height="30px"><?php echo $Note['Valeur'] ?></td>
            <td   width="90px" height="30px"><?php echo $Note['Coefficient'] ?></td>
        </tr>
       </table>
       <?php }  ?>
       </br>
       <table class="table-bordered" style="border-collapse: collapse" left="25%">
        <td  width="180px" height="30px" text-align="center"> Moyenne de l'élève : <?php echo $MoyennedePhilosophie ?></td>
        <td width="195px" height="30px" text-align="center"> Moyenne de la Classe : <?php echo $MoyenneDeClassePhilosopie ?></td>
        </table>
       
       </br>
   
    </br>
      
    <table class="table-bordered" style="border-collapse: collapse">
       <td  width="125px" height="30px" text-align="center" >Moyenne Général :</td>
       <td  width="50px" height="30px" text-align="center"><b><?php echo $MoyenneGeneral ?></b></td> 
   
       <td width="125px" height="30px" text-align="center" >Moyenne Général de la classe :</td>
       <td  width="50px" height="30px" text-align="center"><b><?php echo $Moyenneclasse ?></b></td> 
    </table>
    </br>
</body>
</html>



