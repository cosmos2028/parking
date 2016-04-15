<?php
			

    	?>

    	<input type="date" name="date1" min="<?php 
    	       $demain = date('Y-m-d', strtotime('+1 day')); 
		        echo $demain;?>" required>
<?php $start = strtotime($demain);
	$start = strtotime('+7 day',$start); 
	$datf =date('Y-m-d',$start);
	
?>
		<input type="date" name="date2" min="<?php 
              
            echo $datf;?>" required>
   <?php $demain = new DateTime('tomorrow'); ?>
<input type="date" name="date1" min="<?php echo $demain->format('Y-m-d')?>" required>
<?php
  $datf = $demain;//utile uniquement si tu utilise la variable $demain ailleurs.
  $datf -> add(new DateInterval('P7D'));
?>
<input type="date" name="date2" min="<?php echo $datf->format('Y-m-d'); ?>" required>