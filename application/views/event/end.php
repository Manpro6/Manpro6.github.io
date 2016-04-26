<?php 
    if(isset($eve)) 
    {
		$tgl = substr($eve['end'], 0, 10);
		$jam = substr($eve['end'], 11, 5);
		?>
		<input type="datetime-local" name="end" class="form-control" required min="<?php echo date("Y-m-d").'T'.date("H:i", strtotime('+5 hours'))?>" value="<?php echo $tgl.'T'.$jam?>">
    	<?php
    }         
?>