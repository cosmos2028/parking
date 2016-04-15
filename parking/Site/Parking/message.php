<?php 
session_start();
include("bg.php");
  /* connection a la base de donnée*/
   include("connection_bdd.php");
   
  $html =" ";

  if (isset($_SESSION['login'] )) 
  {
    $login = $_SESSION['login'];
    $rep = $bdd->query("SELECT msg,count(idmsg) as 'numsg' FROM Message 
      where iduser like '$login' ");
     $trouver = 0;
    while ($dones = $rep->fetch() )
          {
            if ($dones['numsg']>0) 
            {
              $htm = $dones['msg'] ;
              $html = "<h3 style='color:#CCCCCC'>$htm</h3>";
              $trouver = 1;
            }
            
          }
    if ( !$trouver) 
    {
      $html = "<h3 style='color:#CCCCCC'>désolé :vous n'avez pas de message</h3>";
    }
  }else $html = "<h3 style='color:red'>désolé :vous n'etes pas connecté</h3>";
  echo $html;  
?> <!-- ce bout de code me permet d'afficher ma page d'acceuil -->
  <head>
    <title>Message</title>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row" style="margin-top:30px;">
         <div class="col-md-6 col-xs-2"> 
          
        </div>
        <div class="col-md-6 col-xs-2"> 
          
        </div>
      </div><!-- /.row -->
      
    </div><!-- /.container-fluid -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>