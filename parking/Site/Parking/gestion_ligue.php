<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Gestion des ligue</title>
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
    <script>
            /*  cette  fonction JavaScript   exécute le code jQuery pour transmettre les donnees de maniere serialize () cela permet de facilite la  transmise au serveur. */
        function submitForm() {
            $.ajax({type:'POST', url: 'traitmt_gestion_lig.php', data:$('#ContactForm').serialize(), success: function(response) {
            $('#ContactForm').find('.form_result').html(response);
        }});

        return false; /* ce false permet de signaler la fin de la requette et arret de regenerer la page*/
    }
    </script>

    <div class="container-fluid">
    <div class="row connexion">
      <h1>
            Réservation parking M2L
      </h1>
    </div><!-- /.titre -->
    <div class="row">

      <div class="col-md-6 col-xs-2"> </div>
      <div class="col-md-6 col-xs-2">
         <div class="row">
           <div class="col-md-4 col-xs-2"> </div>
           <div class="col-md-4 col-xs-2"> 
              <h3 style="font-weight: bold;margin-bottom:40px;">Ajout d'une ligue</h3>
           </div>
           <div class="col-md-4 col-xs-2"> </div>
         </div><!-- /.fin row interne -->
        <div class="row">
          <div class="col-md-4 col-xs-2"> 
       <label>Nom de la ligue</label>
    </div>

    <div class="col-md-4 col-xs-2"> 
 
    <form method="post" action="traitmt_gestion_lig.php" id="ContactForm" onsubmit="return submitForm();">
      <input type="text" name="nomlig"required>
      
            <button class="btn btn-default hide_border" type="submit" name="submit" style="margin-top:20px;">
            Valider</button>
      <div class="form_result"> </div>
      </form>
      </div>
       <div class="col-md-4 col-xs-2"> </div>

        </div>      
        </div>

    </div>
    </div><!-- /.container-fluid -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>