<style>
	#div{
            position: absolute;
            top: calc(1% -1px);
            left: calc(45% - 100px);			
	}
	
	body{
            background: url(hero.jpg);
            background-size:100%;
	}
</style>
<body>
        <div id="contenido">
			<section>
				<h1>Error</h1>
				<h4><?php echo $_REQUEST["sErr"]; ?></h4>
				<a href="index.html">Regresar al inicio</a>
			</section>
		</div>
</body>
<?php
?>