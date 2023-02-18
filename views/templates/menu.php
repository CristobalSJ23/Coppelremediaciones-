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
				<div class="submenu">
					<div class="submenu-items">
						<!--<p>Tablas</p>-->
						<ul>
							<?php  
								//echo "<pre>";
								//var_dump($menu);
								//var_dump($menu['submenu'][0]['nombre']);
								foreach($menu['submenu'][$i]['submenu'] as $j=>$submenu) {
									//var_dump($submenu);
									
							?>
							<li><a href=""> <?= $menu['submenu'][0]['nombre'] ?></a></li>
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
