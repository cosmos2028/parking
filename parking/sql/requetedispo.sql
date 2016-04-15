SELECT PLACE.idplac 
FROM PLACE 
WHERE PLACE.idplac NOT IN (
	SELECT PLACE.idplac 
	FROM RESERVATION
	WHERE (RESERVATION.date_affecte BETWEEN RESERVATION.date_deb AND RESERVATION.date_fin)
	);
/* reservation unitaire*/
SELECT numplace,count(numplace) as 'nbplace' FROM PLACE
          WHERE numplace NOT IN (
          SELECT numplace 
          FROM RESERVATION
          WHERE (day(dateresa) = 30
          		and
          		month(dateresa) = 11
          		and
          		year(dateresa) = 2015 ))
          group by numplace
          limit 1;
/* abonnement*/
SELECT numplace,count(numplace) as 'nbplace' FROM PLACE
          WHERE numplace NOT IN (
          SELECT numplace 
          FROM RESERVATION
          WHERE (dateresa BETWEEN "2015/11/29" AND "2015/12/3"))
          group by numplace;
          
          SELECT numplace,dateresa
          FROM RESERVATION
          WHERE (dateresa BETWEEN "2015/11/29" AND "2015/12/3"))
          ;
/*supprimer un enregistrement*/
         DELETE FROM RESERVATION
                        WHERE dateresa like '2015-12-01'
                    AND numplace = 3);
/*supprimer plusieurs enregistrements*/
DELETE FROM utilisateur
WHERE iduser like 'lestat290@hotmail.fr';