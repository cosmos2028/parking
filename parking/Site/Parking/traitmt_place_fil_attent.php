<?php 
session_start();
include("bg_admin.php"); 
	/* connection a la base de donnée*/
   include("connection_bdd.php");
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    
    <title>LISTE DES PLACE EN ATTENTE</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <?php
       /* on verifie si on a bien les informations qu'on attend et que le contenu ne soit pas vide  */
	if(isset($_SESSION['login'] ) && isset($_POST['datee']))
	{
    ?>
    <h2>Liste des places en attente pour le <?php echo $_POST['datee'];?></h2><br/>
    <?php
    $trouve=0;
      $val = $_POST['datee'];
      $rep1 = $bdd->query("SELECT iduser,rang  FROM liste_attente
          WHERE datefile like '$val'");
      while ($donnes = $rep1->fetch() )
          {
              $trouve=1; 
              $iduser= $donnes['iduser'];
              $numplace= $donnes['rang'];
              $html = "<h3 style='color:#CCCCCC;margin-left:30px;'>rang : $numplace    $iduser </h3>"; 
              echo $html;  
              $html = "";          
         }

         if (!$trouve) 
         {
            $html = "<h3 style='color:#CCCCCC'>Dommage : aucune place en attente pour cette date  </h3>"; 
         }
  }
  else  
  {
   $html = "<h3 style='color:red'>Erreur : veuillez vous connecter </h3>";
  }  
echo $html;
?>
</body>
  </html>