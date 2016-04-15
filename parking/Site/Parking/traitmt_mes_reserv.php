<?php 
session_start();
  /* connection a la base de donnée*/
  include("connection_bdd.php");
  
       /* on verifie si on a bien les informations qu'on attend et que le contenu ne soit pas vide  */
  if(isset($_POST['numplace']) && !empty($_POST['numplace']) &&isset($_POST['dateresa']) && !empty($_POST['dateresa']) && $_SESSION['login'])
  {
    //bloc instructions anul resa
    $dateresa=$_POST['dateresa'];
    $numplace=$_POST['numplace'];
    $trouve=0;
   
    $bdd->query("DELETE FROM RESERVATION
                        WHERE dateresa like '$dateresa'
                    AND numplace = $numplace");
    

    $rep1 = $bdd->query("SELECT iduser FROM LISTE_ATTENTE
          WHERE datefile LIKE '$dateresa'
          AND rang = 1");
      while ($donnes = $rep1->fetch() )
          {
             $user = $donnes['iduser'];
             $trouve=1;          
         }
          if ($trouve) 
         {
          	
          $bdd->query("DELETE FROM LISTE_ATTENTE
                        WHERE datefile like '$dateresa'
                        AND rang = 1 ");

        $msg = "Une réservation a été annulée et vous avez obtenu la place numéro $numplace pour la date du $dateresa ";
        $bdd2 = $bdd->prepare('INSERT INTO MESSAGE(msg, iduser) VALUES(:val,:val1)');
                  $bdd2->execute( array('val' => $msg, 'val1' =>$user));

        $bdd3 = $bdd->prepare('INSERT INTO RESERVATION(dateresa,iduser,numplace) VALUES(:val,:val1,:val2)');
                  $bdd3->execute( array('val' => $dateresa, 'val1' =>$user ,'val2' =>$numplace));

                  $html = "<h3 style='color:#CCCCCC'>BRAVO : réservation annulée </h3>"; 
         /*ordonner les rangs*/
        $rep2 = $bdd->query("SELECT rang ,iduser ,count(*) as 'nbplace' FROM LISTE_ATTENTE
          WHERE datefile LIKE '$dateresa' group by rang,iduser order by rang asc ");
      while ($data = $rep2->fetch() )
          {
          	$tmp = $data['nbplace'];
          	if ($tmp >0) 
            {
            	$tmp2 = $data['rang'];
              	$orang =$data['rang']-1;
              	$bd = $bdd->prepare('INSERT INTO LISTE_ATTENTE(rang,datefile,iduser) VALUES(:val,:val1,:val2)');
                $bd->execute( array('val' => $orang,'val1' => $dateresa ,'val2' =>$data['iduser']));
                $bdd->query("DELETE FROM LISTE_ATTENTE
                        WHERE datefile like '$dateresa'
                        AND rang = $tmp2 ");
                  $tmp -=1;
            }
          }
          }else $html = "<h3 style='color:#CCCCCC'>BRAVO : réservation annulée </h3>"; 
                  
  }else if  (isset($_POST['datefile']) && !empty($_POST['datefile']) && isset($_POST['rang']) && !empty($_POST['rang']) && $_SESSION['login'] )
  {
    //bloc instructions anul demande
    $datefile=$_POST['datefile'];
    $rang=$_POST['rang'];
    $bdd->query("DELETE FROM LISTE_ATTENTE
                        WHERE datefile LIKE '$datefile'
                        AND rang = $rang");
    $rep3 = $bdd->query("SELECT rang ,iduser ,count(*) as 'nbplace' FROM LISTE_ATTENTE
          WHERE datefile LIKE '$datefile'
          AND rang > $rang
           group by rang,iduser order by rang asc ");
    while ($data1 = $rep3->fetch() )
          {
          	$tmp = $data1['nbplace'];
          	if ($tmp >0) 
            {
            	$tmp2 = $data1['rang'];
              	$orang =$data1['rang']-1;
              	$bd = $bdd->prepare('INSERT INTO LISTE_ATTENTE(rang,datefile,iduser) VALUES(:val,:val1,:val2)');
                $bd->execute( array('val' => $orang,'val1' => $datefile ,'val2' =>$data1['iduser']));
                $bdd->query("DELETE FROM LISTE_ATTENTE
                        WHERE datefile like '$datefile'
                        AND rang = $tmp2 ");
                  $tmp -=1;
            }
          }
          $html = "<h3 style='color:#CCCCCC'>BRAVO : votre demande à été effectuée</h3>"; 

  }
  else {
    $html = "<h3 style='color:red'>ERREUR : variables non identifiés </h3>";

  }
echo $html;
?>