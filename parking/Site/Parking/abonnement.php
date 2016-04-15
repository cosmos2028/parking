<?php include("bg.php"); ?> <!-- ce bout de code me permet d'afficher ma page d'acceuil -->

  <head>
    <title>Abonnement</title>
  </head>
  <script>
     /*  cette  fonction JavaScript   exécute le code jQuery pour transmettre les donnees de maniere serialize () cela permet de facilite la  transmise au serveur. */
        function submitForm() {
            $.ajax({type:'POST', url: 'traitmt_abonnemet.php', data:$('#ContactForm').serialize(), success: function(response) {
            $('#ContactForm').find('.form_result').html(response);
        }});

        return false; /* ce false permet de signaler la fin de la requette et arret de regenerer la page*/
    }
  </script>
  
  <body>
    <div class="container-fluid">
    <form method="post" action="traitmt_abonnemet.php" id="ContactForm" onsubmit="return submitForm();">
      <div class="row reservation">

        <div class="col-md-4 col-xs-2"> 
    	     <label>Date de début souhaitée:</label>
        </div>

        <div class="col-md-4 col-xs-2"> 
 
          
    	       <input type="date" name="date1" min="<?php 
    	       $demain = date('Y-m-d', strtotime('+1 day')); 
		        echo $demain;?>" required>
    	
        </div>
        <div class="col-md-4 col-xs-2"> </div>
    	
      </div><!-- /.row -->
      <div class="row reservation">

        <div class="col-md-4 col-xs-2"> 
           <label>Date de fin souhaitée:</label>
        </div>

        <div class="col-md-4 col-xs-2"> 
 
             <input type="date" name="date2" min="<?php 
             $demain = date('Y-m-d', strtotime('+7 day')); 
            echo $demain;?>" required>
      
        </div>
        <div class="col-md-4 col-xs-2"> </div>
      
      </div><!-- /.row -->

      <div class="row">
        <div class="col-md-4  col-xs-8"></div>
        <div class="col-md-4  col-xs-8">
          <button class="btn btn-default hide_border" type="submit" name="submit"style="margin-top: 23px;margin-left: 38px;">
            Envoyer</button>
        </div>
        <div class="col-md-4  col-xs-8"></div>
      </div><!-- /.row -->
      <div class="form_result"> </div>
    </form>
    </div><!-- /.container-fluid -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

