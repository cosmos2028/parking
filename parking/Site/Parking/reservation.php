<?php include("bg.php"); ?> <!-- ce bout de code me permet d'afficher ma page d'acceuil -->

  <head>
    <title>Reservation unitaire</title>
  </head>
  <script>
     /*  cette  fonction JavaScript   exécute le code jQuery pour transmettre les donnees de maniere serialize () cela permet de facilite la  transmise au serveur. */
        function submitForm() {
            $.ajax({type:'POST', url: 'traitmt_uni_reserv.php', data:$('#ContactForm').serialize(), success: function(response) {
            $('#ContactForm').find('.form_result').html(response);
        }});

        return false; /* ce false permet de signaler la fin de la requette et arret de regenerer la page*/
    }
  </script>
  <body>
    <div class="container-fluid">
    
    <div class="row reservation">

    <div class="col-md-4 col-xs-2"> 
    	 <label>Date souhaitée:</label>
    </div>

    <div class="col-md-4 col-xs-2"> 
 
    <form method="post" action="traitmt_uni_reserv.php" id="ContactForm" onsubmit="return submitForm();">
    	<input type="date" name="datee" min="<?php 
    	$demain = date('Y-m-d', strtotime('+1 day')); 
		  echo $demain;?>" required>
    	
            <button class="btn btn-default hide_border" type="submit" name="submit">
            Envoyer</button>
       <div class="form_result"> </div>
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

