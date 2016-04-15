<?php  

/* connection a la base de donnée*/
   include("connection_bdd.php");
                /*on recupere toute la ligne de la table produit pour cat_code = 'mam*/
      $rep = $bdd->query("SELECT iduser,nom,libel FROM utilisateur,ligue where etat = 0
        and utilisateur.idlig = ligue.idlig");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Liste demande en attente</title>
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
        function submitForm(rep) {
            $.ajax({type:'POST', url: 'traitmt_list_attente.php', data:$('#'+rep).serialize(), success: function(response) {
            $('#'+rep).find('.form_result').html(response);
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
      <div class="col-md-6 col-xs-2">
        <?php 
        $i =0;
        $trouv= 0;
         // On affiche chaque entrée une à une
          while ($dones = $rep->fetch() )
          { 
            $i++;
            $trouv= 1;
          ?>
            <form method="post" action="traitmt_list_attente.php" id="ContactForm<?php echo $i;?>" onsubmit="return submitForm('ContactForm<?php echo $i;?>');">
              <label for="mdp">Nouvel utilisateur :<br/>
              Email  : <?php  $val=$dones['iduser'] ;echo $val?><br/>
              Nom &nbsp; : <?php  $val1=$dones['nom'] ;echo $val1?><br/>
              Ligue  : <?php  $val2=$dones['libel'] ;echo $val2?>
              <input type="hidden"  name="iduser" value ="<?php echo $val?>" />
              <input type="hidden"  name="nom" value ="<?php echo $val1?>" />
              <input type="hidden"  name="libel" value ="<?php echo $val2?>" /></label> 
            <div class="row" style="padding-left: 279px;">
            <input class="btn btn-default hide_border" type="submit" name="accepter" id="accepter" value="accepter"/>
            
            <input class="btn btn-default hide_border" type="submit" name="refuser" id="refuser" value="refuser"/>
           
            </div>
            <div class="form_result"> </div>
            </form><br/>
          <?php
          }
          if (!$trouv) {
            $html = "<h3 style='color:#CCCCCC'>Désolé : aucune demande </h3>"; 
            echo($html);
          }
          ?>
      </div>
    <div class="col-md-6 col-xs-2"></div>
    </div>
    

    
    </div><!-- /.container-fluid -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>