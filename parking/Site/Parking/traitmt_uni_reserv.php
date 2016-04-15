<?php 
session_start();
	/* connection a la base de donnée*/
   include("connection_bdd.php");
   
       /* on verifie si on a bien les informations qu'on attend et que le contenu ne soit pas vide  */
	if(isset($_SESSION['login'] ) && isset($_POST['datee']))
	{
        $date = $_POST['datee'];
        $trouver = 0;
        $trouv=0;
        $rang = 1;
        $rep = $bdd->query("SELECT numplace,count(numplace) as 'nbplace' FROM PLACE
          WHERE numplace NOT IN (
          SELECT numplace 
          FROM RESERVATION
          WHERE (dateresa like '$date'))
          group by numplace
          limit 1");

        while ($donnes = $rep->fetch() )
          {
            if ($donnes['nbplace']>0) 
            {
              $trouver = 1;
              $place = $donnes['numplace'];
            }
            
          }
          $rep = $bdd->query("SELECT * FROM LISTE_ATTENTE");

        while ($dones = $rep->fetch() )
          {
            if ($dones['iduser']== $_SESSION['login'] &&
              $dones['datefile']== $date) 
            {
              $trouv = 1;
              $html = "<h3 style='color:#CCCCCC'>désolé :vous avez déjà été mis sur la liste d'attente pour cette date</h3>";
            }elseif ($dones['datefile'] == $date) 
            {
              $rang +=1;
            }
            
          }

          if ($trouver) 
          {
            $bdd = $bdd->prepare('INSERT INTO RESERVATION(dateresa,iduser,numplace) VALUES(:val,:val1,:val2)');
                  $bdd->execute( array('val' => $date, 'val1' =>$_SESSION['login'] ,'val2' =>$place));

                  $html = "<h3 style='color:#CCCCCC'>BRAVO : reservation Effectuée </h3>"; 
          }elseif(!$trouv)
          {
            $bdd = $bdd->prepare('INSERT INTO LISTE_ATTENTE(rang,datefile,iduser) VALUES(:val,:val1,:val2)');
                  $bdd->execute( array('val' => $rang,'val1' => $date ,'val2' =>$_SESSION['login']));

                  $html = "<h3 style='color:#CCCCCC'>désolé : reservation impossible mais vous etes sur la liste d'attente </h3>"; 
          }
        
  }else $html = "<h3 style='color:red'>désolé :vous n'etes pas connecté</h3>";  
echo $html;
?>