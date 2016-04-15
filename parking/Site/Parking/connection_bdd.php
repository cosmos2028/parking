<?php
	try
           {
                    $bdd = new PDO('mysql:host=192.168.100.3;dbname=parking;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
                catch(Exception $e)
                {
                        die('Erreur : '.$e->getMessage());
                }
 ?>