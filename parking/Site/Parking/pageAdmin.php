<?php 
session_start();

if(isset($_SESSION['login']) && !empty($_SESSION['login']))
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administrateur</title>
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
    <div class="container-fluid">
    <div class="row connexion">
      <h1>
            Réservation parking M2L
      </h1>
    </div><!-- /.titre -->
    <div class="row">
      <form action="deconnexion.php" method="" >
        <button class="btn btn-default hide_border control-group6" type="submit" style="margin-right:94px;">
        Deconnexion</button>
      </form>
      </div>
    <div class="row pageAdmin">
      <div class="col-md-2  col-xs-8 "></div>
      <div class="col-md-3  col-xs-8 ">
        <a href="list_util.php">Liste des utilisateurs</a>
      </div>
      <div class="col-md-7  col-xs-8 "></div>
    </div><!-- /.row -->
    <div class="row pageAdmin">
      <div class="col-md-2  col-xs-8 "></div>
      <div class="col-md-3  col-xs-8 ">
        <a href="list_demande_attente.php">liste des demandes en attente</a>
      </div>
      <div class="col-md-7  col-xs-8 "></div>
    </div><!-- /.row -->
    <div class="row pageAdmin">
      <div class="col-md-2  col-xs-8 "></div>
      <div class="col-md-3  col-xs-8 ">
        <a href="attrib_mano_place.php">Atribution manuel des places</a>
      </div>
      <div class="col-md-7  col-xs-8 "></div>
    </div><!-- /.row -->
    <div class="row pageAdmin">
      <div class="col-md-2  col-xs-8 "></div>
      <div class="col-md-3  col-xs-8 ">
        <a href="place_travaux.php">Place en travaux</a>
      </div>
      <div class="col-md-7  col-xs-8 "></div>
    </div><!-- /.row -->
    <div class="row pageAdmin">
      <div class="col-md-2  col-xs-8 "></div>
      <div class="col-md-3  col-xs-8 ">
        <a href="gestion_ligue.php">Gestion des ligues</a>
      </div>
      <div class="col-md-7  col-xs-8 "></div>
    </div><!-- /.row -->
    <div class="row reservation">

    <div class="col-md-4 col-xs-2"> 
       <label>Liste des places pour le:</label>
    </div>

    <div class="col-md-4 col-xs-2"> 
 
    <form method="post" action="traitmt_liste__place.php">
      <input type="date" name="datee"required>
      
            <button class="btn btn-default hide_border" type="submit" name="submit">
            OK</button>
    
      </form>
      </div>
       <div class="col-md-4 col-xs-2"> </div>
      
    </div><!-- /.row -->
    <div class="row reservation">

    <div class="col-md-4 col-xs-2"> 
       <label>File d'attente pour le:</label>
    </div>

    <div class="col-md-4 col-xs-2" > 
 
    <form method="post" action="traitmt_place_fil_attent.php">
      <input type="date" name="datee"required>
      
            <button class="btn btn-default hide_border" type="submit" name="submit">
            OK</button>
    
      </form>
      </div>
       <div class="col-md-4 col-xs-2"> </div>
      
    </div><!-- /.row -->

    
    </div><!-- /.container-fluid -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php }else 
{
  $html = "<h3 style='color:#CCCCCC'>ERREUR : vous n'etes pas connecté</h3>";
}
?>