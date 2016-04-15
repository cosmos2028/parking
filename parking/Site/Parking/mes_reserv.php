<?php 
session_start();
include("bg.php"); 
include("connection_bdd.php");

  if(isset($_SESSION['login'] ))
    {
      $html = " ";
      $login = $_SESSION['login'];
      /*on recupere toute la ligne de la table produit pour cat_code = 'mam*/
      $reponse = $bdd->query("SELECT * FROM LISTE_ATTENTE
        where iduser = '$login'");
      $rep = $bdd->query("SELECT dateresa,numplace FROM RESERVATION
        where iduser = '$login'");

}else $html = "<h3 style='color:red'>désolé :vous n'etes pas connecté</h3>";  
echo $html;
               
?> <!-- ce bout de code me permet d'afficher ma page d'accueil -->

  <head>
    <title>Mes Reservation</title>
  </head>
  
  <body>
    <script>
       
            /*  cette  fonction JavaScript   exécute le code jQuery pour transmettre les donnees de maniere serialize () cela permet de facilite la  transmise au serveur. */
        function submitForm(rep) {
            $.ajax({type:'POST', url: 'traitmt_mes_reserv.php', data:$('#'+rep).serialize(), success: function(response) {
            $('#'+rep).find('.form_result').html(response);
        }});

        return false; /* ce false permet de signaler la fin de la requette et arret de regenerer la page*/
    }
    function submitForm1(rep) {
            $.ajax({type:'POST', url: 'traitmt_mes_reserv.php', data:$('#'+rep).serialize(), success: function(response) {
            $('#'+rep).find('.form_result').html(response);
        }});

        return false; /* ce false permet de signaler la fin de la requette et arret de regenerer la page*/
    }

    </script>
    <div class="container-fluid">
      <div class="row" style="margin-top:30px;">
         <div class="col-md-6 col-xs-2"> 
         <?php 
         $i = 0;
         // On affiche chaque entrée une à une
          while ($donnees = $reponse->fetch() )
          { 
            $i++;
          ?>
          <form method="post" action="traitmt_mes_reserv.php" id="ContactForm1<?php echo $i;?>" onsubmit="return submitForm1('ContactForm1<?php echo $i;?>');">
            
              <label>Vous êtes <?php $val=$donnees['rang'];echo $val?>e sur la liste d'attente pour la date du <?php $val1=$donnees['datefile'];echo $val1?> </label>
              <input type="hidden"  name="rang" value ="<?php echo $val?>" >
              <input type="hidden"  name="datefile" value="<?php echo $val1?>">
            <button class="btn btn-default hide_border" type="submit" name="submit">
            Annuler cette demande</button>
             <div class="form_result"> </div>
            </form><br/>
          <?php
          }
          ?>

        </div>
        <div class="col-md-6 col-xs-2"> 
          <?php 
          $i =1;
         // On affiche chaque entrée une à une
          while ($dones = $rep->fetch() )
          { 
            $i++;
          ?>
            <form method="post" action="traitmt_mes_reserv.php" id="ContactForm<?php echo $i;?>" onsubmit="return submitForm('ContactForm<?php echo $i;?>');">
              <label for="mdp">Vous avez réservé la place numéro <?php  $val=$dones['numplace'] ;echo $val
              ?>
              <input type="hidden"  name="numplace" value ="<?php echo $val?>">
              <?php 
               ;?> du <?php  $val1=$dones['dateresa'] ;echo $val1?>
               <input type="hidden"  name="dateresa" value="<?php echo $val1?>"> </label> 
                
            <button class="btn btn-default hide_border" type="submit" name="submit">
            Annuler cette réservation</button>
            <div class="form_result"> </div>
            </form><br/>
            
          <?php
          }
          ?>
      </div>
        </div>
      </div><!-- /.row -->
    
      
    </div><!-- /.container-fluid -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>