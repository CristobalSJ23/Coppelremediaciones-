<div class="navegacion">
	<nav class="navbar navbar-light bg-light justify-content-between">
		<ul>
			<li><a href="index.php">Inicio <span class="icon icon-up-dir"></span></a></li>
			<?php 
			/* var_dump($menu['nombre_menu'][0]);
			exit; */
				foreach($menu['nombre_menu'] as $i=>$dato) {
			?>
			<li>
				<a href="#"><?= $dato ?> <span class="icon icon-up-dir"></span></a>
			</li>
			<?php 
				}
			?>
		</ul>
		<form class="form-inline">			
			<a href="">Cerrar sesión <span class="icon icon-up-dir"></span></a>
		</form>
	</nav>
</div>
