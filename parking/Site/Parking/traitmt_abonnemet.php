<?php 
session_start();
	
       /* on verifie si on a bien les informations qu'on attend et que le contenu ne soit pas vide  */
	if(isset($_SESSION['login'] ) && isset($_POST['date1']) && isset($_POST['date2']))
	{

        $datedebut = $_POST['date1'];
        $datefin = $_POST['date2'];
        $startTime = strtotime($datedebut); 
        $endTime = strtotime($datefin); 
        $dateactu =date('Y-m-d',$startTime);
        
      while ($startTime <= $endTime)
      {
          $trouver = 0;
          $trouv=0;
          $rang = 1;

          /* connection a la base de donnée*/
              include("connection_bdd.php");

         
        $rep = $bdd->query("SELECT numplace,count(numplace) as 'nbplace' FROM PLACE
          WHERE numplace NOT IN (
          SELECT numplace 
          FROM RESERVATION
          WHERE (dateresa like '$dateactu'))
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
              $dones['datefile']== $dateactu) 
            {
              $trouv = 1;
              $html = "<h3 style='color:#CCCCCC'>désolé :vous avez déjà été mis sur la liste d'attente pour le $dateactu</h3>";
            }elseif ($dones['datefile'] == $dateactu) 
            {
              $rang +=1;
            }
    
          }

          if ($trouver) 
          {
            $bdd = $bdd->prepare('INSERT INTO RESERVATION(dateresa,iduser,numplace) VALUES(:val3,:val4,:val5)');
                  $bdd->execute( array('val3' => $dateactu, 'val4' =>$_SESSION['login'] ,'val5' =>$place));

                  $html = "<h3 style='color:#CCCCCC'>BRAVO : reservation Effectuée pour le $dateactu </h3>"; 
          }elseif(!$trouv)
          {
            
            $bdd = $bdd->prepare('INSERT INTO LISTE_ATTENTE(rang,datefile,iduser) VALUES(:val,:val1,:val2)');
                  $bdd->execute( array('val' => $rang,'val1' => $dateactu ,'val2' =>$_SESSION['login']));

                  $html = "<h3 style='color:#CCCCCC'>désolé : reservation impossible mais vous etes sur la liste d'attente pour le $dateactu</h3>"; 
          }
          echo $html;
        
        $startTime = strtotime('+1 day',$startTime); 
        $dateactu =date('Y-m-d',$startTime);
        $html = ""; 
    } 

  }else $html = "<h3 style='color:red'>désolé :vous n'etes pas connecté</h3>";  
echo $html;
?>