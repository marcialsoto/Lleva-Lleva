<!-- Single button -->
<div class="sharing">
	<div class="btn-group dropup">
		<a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="fa fa-share" aria-hidden="true"></i> <span class="hidden-xs">Compartir</span>
		</a>
		<ul class="dropdown-menu">
			<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_shortlink(); ?>">Facebook</a></li>
			<li><a href="https://twitter.com/home?status=<?php echo wp_get_shortlink(); ?>">Twitter</a></li>
			<li class="visible-xs"><a href="whatsapp://send?text=Estoy viendo: <?php echo wp_get_shortlink(); ?>" data-action="share/whatsapp/share">Compartir vía WhatsApp</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="#">Enviar por mail</a></li>
		</ul>
	</div>
</div>