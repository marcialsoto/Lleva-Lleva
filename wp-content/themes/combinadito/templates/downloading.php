<?php 
	//ACF 
	$gif__ID = get_field('gif__ID'); 
?>
<?php if ($gif__ID) {?>
	<a href="<?php echo 'http://i.giphy.com/'.$gif__ID.'.gif'; ?>" download="<?php echo $gif__ID; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> <span class="hidden-xs">Descargar</span></a>
<?php }?>