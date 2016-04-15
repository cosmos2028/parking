<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
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

    <div class="row bg">
      
      <div class="col-md-1  col-xs-8 "></div>
      <div class="col-md-3  col-xs-8 uni">
        <a href="reservation.php">Réservations unitaires</a>
      </div>
      <div class="col-md-3  col-xs-8 abon">
        <a href="abonnement.php">Abonnements</a>
      </div>
      <div class="col-md-2  col-xs-8 ">
        <a href="mes_reserv.php">Mes réservations</a> 
      </div>
      <div class="col-md-3  col-xs-8 colMsg">
        <a href="message.php">Messages</a>

      </div>
      
    </div><!-- /.row .bg -->
    <div class="row">
      <form action="deconnexion.php" method="" >
        <button class="btn btn-default hide_border control-group6" type="submit" style="margin-right:94px;">
        Deconnexion</button>
      </form>
      </div>

    </div><!-- /.container-fluid -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>