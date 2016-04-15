<?php 
	/* connection a la base de donnée*/
   include("connection_bdd.php");
   
       /* on verifie si on a bien les informations qu'on attend et que le contenu ne soit pas vide  */
	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['datnaiss']) && isset($_POST['lig'])
	 )
	{
    $val = $_POST['nom'];
    $va2 = $_POST['prenom'];
    $va3 = $_POST['email'];
    $va4 = $_POST['mdp'];
    $va5 = $_POST['datnaiss'];
    $va6 = $_POST['lig'];

		$rep = $bdd->query("SELECT iduser FROM UTILISATEUR ");
      $trouver = 0;
      // On affiche chaque entrée une à une
      while ($donnes = $rep->fetch() )
      { 
        if ($donnes['iduser'] == $va3) 
        {
          $trouver = 1;
        }
      }
      if (!$trouver) 
      {
        $repo = $bdd->query("SELECT idlig FROM ligue where libel = '$va6' ");
        
      // On affiche chaque entrée une à une
      while ($donnes = $repo->fetch() )
      {
         $dones =   $donnes['idlig'];
      }
       
        $bdd->query("INSERT INTO utilisateur(iduser,nom,prenom,mdp,datenaiss ,idlig) 
      VALUES('$va3', '$val','$va2','$va4','$va5',$dones)");

         $html = "<h3 style='color:#CCCCCC'>BRAVO : Vous êtes enregistré </h3>"; 
      }else
      {
        $html = "<h3 style='color:red'>Erreur :Ce mail existe déjà</h3>"; 
      }
      
 			
  } else $html = "<h3 style='color:red'>Erreur :variable non renseigné</h3>"; 

echo $html;

?>