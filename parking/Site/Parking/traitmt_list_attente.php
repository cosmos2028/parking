<?php 
session_start();
  /* connection a la base de donnée*/
  include("connection_bdd.php");
  
       /* on verifie si on a bien les informations qu'on attend et que le contenu ne soit pas vide  */
  if(isset($_SESSION['login'] ) && isset($_POST['iduser'])&& isset($_POST['accepter']))
  {
      $val = $_POST['iduser'];


            $bdd->query("UPDATE utilisateur
              set etat = 1 
              WHERE iduser like'$val'");
                  

                  $html = "<h3 style='color:#CCCCCC'>BRAVO : requete Effectuée </h3>"; 
        
  }elseif (isset($_SESSION['login'] ) && isset($_POST['iduser'])&& isset($_POST['refuser'])) 
  {
    $val = $_POST['iduser'];
    echo $val;
            $bdd->query("DELETE FROM utilisateur
            
              WHERE iduser like '$val'");

   $html = "<h3 style='color:#CCCCCC'>BRAVO : suppression Effectuée </h3>"; 
  }else  
  {
   $html = "<h3 style='color:red'>Erreur : veuillez vous connecter </h3>";
  }  
echo $html;
?>