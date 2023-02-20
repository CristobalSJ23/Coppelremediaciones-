<div class="navegacion">
	<nav class="navbar navbar-light bg-light justify-content-between">
		<ul>
			<li><a href="index.php">Inicio <span class="icon icon-up-dir"></span></a></li>
			<?php 
				foreach($menu['nombre_menu'] as $i=>$dato) {
			?>
			<li>
				<a href="#"><?= $dato ?> <span class="icon icon-up-dir"></span></a>
				<div class="submenu">
					<div class="submenu-items">
						
						<ul>
							<?php  				
								foreach($menu['submenu'][$i]['nombre'] as $j=>$submenu) {							
							?>
							<li><a href="<?= $submenu ?>.php"> <?= $submenu ?></a></li>
							<?php 
								}
							?>
						</ul>
					</div>
				</div>
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
