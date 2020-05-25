<div id="menu">
	<nav>
		<h3>Secciones</h3>
		<ul>
			<?php
					if (isset($_SESSION["tipo"])){
						if ($_SESSION["tipo"]=="Administrador"){
							
				?>
				<li>
					<a style="text-decoration: none; color: black; font-size: 20" href="tabClientes.php">Clientes</a>
				</li>
				<?php
						} 
						if ($_SESSION["tipo"]=="Cliente"){
				?>
					<li>
						<a style="text-decoration: none; color: black; font-size: 20" href="tabCasas.php">Casas</a>
					</li>
					<?php
					} 
				?>
						<li>
							<a style="text-decoration: none; color: black; font-size: 20" href="logout.php">Salir</a>
						</li>
						<br/>
						<?php
					} else {
				?>
							<?php
					}
				?>
		</ul>
	</nav>
</div>