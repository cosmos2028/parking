<?php 
session_start();
	/* connection a la base de donnée*/
   include("connection_bdd.php");
   
       /* on verifie si on a bien les informations qu'on attend et que le contenu ne soit pas vide  */
	if(isset($_POST['id']) && isset($_POST['mdp']) )
	{

    $trouvadmin = 0;
    $val =$_POST['id'];
    $val2 = $_POST['mdp'];
    $repo = $bdd->query("SELECT iduser,mdp,etat FROM utilisateur
          WHERE idlig IN (
          SELECT idlig 
          FROM ligue
          WHERE (libel like 'administrateur'))");
    while ($data = $repo->fetch() )
          {
            if ($data['iduser']==$val && $data['mdp']==$val2 && $data['etat'] ==1) 
            {
              $trouvadmin = 1;
            }
            
          }
      if ($trouvadmin) 
      {
        $_SESSION['login'] = $val;
          $_SESSION['pwd'] = $val2;
         $html= '<script>window.location.replace("http://localhost/parking/pageAdmin.php")</script>';
         
      }else
      {
        $trouver = 0;
        $rep = $bdd->query("SELECT iduser,mdp,etat FROM UTILISATEUR");
        while ($donnes = $rep->fetch() )
          {
            if ($donnes['iduser']== $val && $val2 == $donnes['mdp'] && $donnes['etat'] ==1)
            {
              $trouver = 1;
            }
            
          }
        if ($trouver) 
        {
          $_SESSION['login'] = $val;
          $_SESSION['pwd'] = $val2;
          $html= '<script>window.location.replace("http://localhost/parking/reservation.php")</script>';
        }else $html = "<h3 style='color:red'>ERREUR:Identifiants erronés ou non validés</h3>";
      }
  } 
echo $html;
?>