<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Attribution manuelle des places</title>
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

    <div class="row row_attribut">
      <div class="col-md-6  col-xs-8 ">
        <div class="row">
          <div class="col-md-4 col-xs-2"> </div>
          <div class="col-md-6 col-xs-2"> 

              <form method="post" action="testt.php">

              <label for="util">Utilisateur:</label>
              <input type="email" class="input_user" id="util" placeholder="ex:lestat@hotmail.fr" required>
          </div>
          <div class="col-md-2 col-xs-2"> </div>
        </div><!-- /.row interne -->
        <div class="row row2_attribut">
          <div class="col-md-4 col-xs-2"> </div>
          <div class="col-md-6 col-xs-2"> 
              <label>Date souhaitée:</label>
          
              <input type="date" name="datee"required>
              <div class="row"> 
               <div class="col-md-6 col-xs-2"> </div>
                <div class="col-md-4 col-xs-2">

                  <button class="btn btn-default hide_border row2_attribut center_bouton" type="submit" name="submit">
                  Valider</button>
                </div>
                 <div class="col-md-2 col-xs-2"> </div>

              </div><!-- /.row interne button -->

              </form>
          </div>
          <div class="col-md-2 col-xs-2"> </div>
      
        </div><!-- /.row interne2-->

      </div>

      <div class="col-md-6  col-xs-8 ">
        <div class="row">
          <div class="col-md-4 col-xs-2"> </div>
          <div class="col-md-6 col-xs-2"> 

              <form method="post" action="testt.php">

              <label for="util">Utilisateur:</label>
              <input type="email" class="input_user" id="util" placeholder="ex:lestat@hotmail.fr" required>
          </div>
          <div class="col-md-2 col-xs-2"> </div>
        </div><!-- /.row interne -->
        <div class="row row2_attribut">
          <div class="col-md-4 col-xs-2"> </div>
          <div class="col-md-6 col-xs-2"> 

               <label>Date de début:</label>
          
              <input type="date" name="datee"required style=" margin-left: 9px;">
          </div>
          <div class="col-md-2 col-xs-2"> </div>
        </div><!-- /.row interne -->

        <div class="row row2_attribut">
          <div class="col-md-4 col-xs-2"> </div>
          <div class="col-md-6 col-xs-2"> 

               <label>Date de fin:</label>
          
              <input type="date" name="datee"required style="margin-left: 35px;">
              <div class="row"> 
               <div class="col-md-6 col-xs-2"> </div>
                <div class="col-md-4 col-xs-2">

                  <button class="btn btn-default hide_border row2_attribut center_bouton" type="submit" name="submit">
                  Valider</button>
                </div>
                 <div class="col-md-2 col-xs-2"> </div>

              </div><!-- /.row interne button -->

          </div>
          <div class="col-md-2 col-xs-2"> </div>
        </div><!-- /.row interneTEST -->

              </form>
          </div>
          
        <!-- </div> /.row interne2 -->

      <!-- </div> -->
    </div><!-- /.row -->

    </div><!-- /.container-fluid -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>