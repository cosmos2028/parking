<?php 
session_start();
	/* connection a la base de donnée*/
   include("connection_bdd.php");
   
       /* on verifie si on a bien les informations qu'on attend et que le contenu ne soit pas vide  */
	if(isset($_SESSION['login'] ) && isset($_POST['nomlig']))
	{
      $trouve=0;  
      $val = $_POST['nomlig'];
      $rep1 = $bdd->query("SELECT libel FROM ligue");
      while ($donnes = $rep1->fetch() )
          {
            if ($val == $donnes['libel']) 
            {
              $trouve=1; 
            }
                      
         }
         if (!$trouve) 
         {
            $bd = $bdd->prepare('INSERT INTO ligue(libel) VALUES(:val)');
            $bd->execute( array('val' => $val));
                  
            $html = "<h3 style='color:#CCCCCC'>BRAVO : Enregistrement Effectué </h3>"; 
         }else
            $html = "<h3 style='color:red'>Erreur : cette ligue existe déjà</h3>"; 
  }
  else  
  {
   $html = "<h3 style='color:red'>Erreur : veuillez vous connecter </h3>";
  }  
echo $html;
?>