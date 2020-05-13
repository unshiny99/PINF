<!-- 

               //////// TODO ////////


   //// au debut ajout info commerce
   //// après modif info commerce et agrandir service
   //// après modif info commerce et agrandir service et restreindre service
   //// après modif info commerce et agrandir service et restreindre service et modif jours




   ///// quand tout sera bien, on pourra mettre blacklister et déblacklister
-->



<ul id="menu">
   <?php
      if(!aInfo())
      {
         $mavariable='<li><a href="index.php?uc=affectInfo"> Ajouter des informations commerce </a></li>'; 
         echo $mavariable;
      }
      else
      {
         $mavariable='<li><a href="index.php?uc=modifInfo"> Modifier mes informations commerce </a></li>'; 
         echo $mavariable;
         if(!aService())
         {
            $mavariable='<li><a href="index.php?uc=affectService"> Agrandir mes services proposé(s) </a></li>'; 
            echo $mavariable;
         }
         else
         {
            $mavariable='<li><a href="index.php?uc=affectService"> Agrandir mes services proposé(s) </a></li>'; 
            echo $mavariable;
            $mavariable='<li><a href="index.php?uc=suppService"> Restreindre mes services proposé(s) </a></li>'; 
            echo $mavariable;
            $mavariable='<li><a href="index.php?uc=modifJourOuverture"> Modifier mes jours d\'ouverture </a></li>'; 
            echo $mavariable;
            if(joursExiste())
            {
               $mavariable='<li><a href="index.php?uc=blacklisterPro"> Blacklister un client de votre site </a></li>'; 
               echo $mavariable;
               $mavariable='<li><a href="index.php?uc=deblacklisterPro"> Déblacklister un client de votre site </a></li>'; 
               echo $mavariable;
            }

         }





      }
      
   ?>






</ul>



















<!--
<div id="MesHoraires">
<form method="POST" action="index.php?uc=gererAdminPro&action=modifHoraires">
   <fieldset>
     <legend>Modifier mes horaires</legend>

</form>
</div>
   -->