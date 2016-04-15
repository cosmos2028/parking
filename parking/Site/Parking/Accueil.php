<?php  

/* connection a la base de donnée*/
  include("connection_bdd.php");
  
                /*on recupere toute la ligne de la table produit pour cat_code = 'mam*/
      $reponse = $bdd->query("SELECT libel FROM ligue");


    // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch() )
    {        
      $tab[] = $donnees['libel']; /* stocke chaque entrée dans un tableau */
    }
    /* cette fonction me permet d'ajouter les differentes ligne des produits*/
    /* permet de d'afficher la liste déroulante*/
      function liste_deroulant($tableau) {

  foreach ($tableau  as $element) {
    ?>
  
    <option value="<?php echo $element?>"> <?php echo $element; ?></option>    

  <?php
}

}
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
    
    <title>Accueil</title>

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
    //     function submitForm2() {
    //         $.ajax({type:'POST', url: 'traitmt_accueil.php', data:$('#ContactForm2').serialize(), success: function(response) {
    //         $('#ContactForm2').find('.form_result').html(response);
    //     }});

    //     return false; /* ce false permet de signaler la fin de la requette et arret de regenerer la page*/
    // }
//     $('#ContactForm').on( 'submit' , function(event){
 
//  $this = $(this);
//  event.preventDefault();
 
//    $.ajax({
//       url: $this.attr('action'),
//       type: $this.attr('method'),
//       data: $this.serialize(),
//       beforeSend: function() { 
//        // ton before send ici
//       },
//       success: function(response) {
//        // ton success ici  
//        $('#ContactForm').find('.form_result').html(response);    
//       }
//    }); //fin AJAX
// }); // fin on submit #ContactForm

    </script>
    <script>
            /*  cette  fonction JavaScript   exécute le code jQuery pour transmettre les donnees de maniere serialize () cela permet de facilite la  transmise au serveur. */
        function submitForm() {
            $.ajax({type:'POST', url: 'traitmt_accueil_connexion.php', data:$('#ContactForm').serialize(), success: function(response) {
            $('#ContactForm').find('.form_result').html(response);
        }});

        return false; /* ce false permet de signaler la fin de la requette et arret de regenerer la page*/
    }

    function submitForm2() {
            $.ajax({type:'POST', url: 'traitmt_accueil.php', data:$('#ContactForm2').serialize(), success: function(response) {
            
              //window.location.href = response.redirect;
             
            $('#ContactForm2').find('.form_result').html(response);
            
        }});

        return false; /* ce false permet de signaler la fin de la requette et arret de regenerer la page*/
    }


    </script>

    <div class="container-fluid">

      <div class="row connexion">
        <h1>
            Réservation parking M2L
          </h1>

        <div class="col-md-8  col-xs-8 "> </div>
        <div class="col-md-4 col-xs-12"> 
          
          <form method="post" action="traitmt_accueil_connexion.php" id="ContactForm" onsubmit="return submitForm();" class="form">
                <input type="text" class="form-control" placeholder="Email" required autofocus name="id">
                <input type="password" class="form-control" placeholder="***********" required name="mdp">
                <button class="btn btn-default hide_border" type="submit">
                    Connexion</button>
                <a href="#" class="forgetpass">Mot de passe oublié ?</a>
                 <div class="form_result"> </div>
          </form><!-- /.form -->

        </div>
        </div><!-- /.row .connexion-->

        <div class="row homText">
        <div class="col-md-6 col-xs-2"> 
          <p>
            Bienvenue sur le site de gestion des réservations <br/>
            pour le parking de la M2L. Pour accéder au service,<br/>
            veuillez vous connecter.<br/>
            Si vous n'avez pas encore de compte, remplissez<br/>
            le formulaire suivant pour créer votre compte.<br/>
          </p>
        </div>
        <div class="col-md-6  col-xs-8 ">
        <!-- <div class="col-md-4  col-xs-2"> -->
          <h2>
            Créer un compte utilisateur
          </h2>
          <div class="form-group">
          <form method="post" action="traitmt_accueil.php" id="ContactForm2" onsubmit="return submitForm2();">
          <div class="row">
              <label for="nom">Nom:</label>
              <input type="text" class="control-group1" id="nom" placeholder="Nom" name="nom" required>
            </div>
            <div class="row">
              <label for="prenom">Prénom:</label>
              <input type="text" class="control-group5" id="prenom" placeholder="Prénom" name="prenom" required>
            </div>
            <div class="row">
              <label for="email">Adresse e-mail:</label>
              <input type="email" class="control-group2" id="email" placeholder="ex:lestat290@hotmail.fr" name="email" required>
            </div>
            <div class="row">
              <label for="mdp">Mot de passe:</label>
                <input type="password" class="control-group7" id="mdp" placeholder="***********" name="mdp" required>
            </div>
            <div class="row">
              <label for="datNaiss">Date de naissance:</label>
              <input type="date" class="control-group3" id="datNaiss" name="datnaiss" required style="width:197px;">
            </div>
            <div class="row">
              <label for="ligue">Ligue:</label>
               <select name="lig" id="lig"  style="margin-left: 97px;width: 197px;height: 31px;">

             <?php liste_deroulant( $tab); ?>   <!-- permet d'afficher la liste déroulante -->
               
             </select>
              
              <!-- <input type="text" class="control-group4" id="ligue" name="lig" required> -->
            </div>
            <div class="row">
              <button class="btn btn-default hide_border control-group6" type="submit">
              Envoyer</button>
              
            </div>
            <div class="form_result"> </div><br/><br/>  <!--  j'ai inclus un élément div à laquelle que je vais  mettre à jour dynamiquement la réponse du serveur -->
            
            </form>
          </div><!-- /.form-group-->
        </div>
      </div><!-- /.row.homText -->


    </div><!-- /.container-fluid -->

  </body>
</html>