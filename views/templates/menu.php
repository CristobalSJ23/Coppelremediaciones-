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
								// var_dump($menu['submenu'][$i]['url'][1]);	
								foreach($menu['submenu'][$i]['nombre'] as $j=>$submenu) {							
							?>
							<li><a href="<?= $menu['submenu'][$i]['url'][$j] ?>"> <?= $submenu ?></a></li>
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
