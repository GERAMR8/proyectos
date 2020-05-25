<!DOCTYPE html>
    <head>
    <meta http-equiv="Content-Type" content="text/html"/>
		<title>Ejemplo Di&aacute;logo</title>
		<link href="jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">
		<script type="text/javascript"src="js/jquery-3.2.1.js">
		</script>
		<script type="text/javascript" src="jquery-ui-1.12.1.custom/jquery-ui.js">
		</script>
		<!-- Inicialización de diálogo-->
		
		<style>
		#principal
		{
		width: 100px;
		height: 100px;
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
		}

		</style>

		<script type="text/javascript">
			$(document).ready(function(){
                $( "#principal" ).dialog({
					autoOpen: true,
					show: {
						effect: "fold", 
						duration: 1000
					},
					hide: {
						effect: "explode", 
						duration: 1000
					}
					, modal: true
				});
				
			});

		</script>
		
    </head>
	   <body background="img/hero.jpg">
	   <div id="principal" >
		<h1> Formulario </h1> 
            <form method="POST" action="login.php" >
                Nombre: 
                <input type="text" name="txtCve" required/>
                <br/>
				Contrase&ntilde;a:   
				<input type="password" name="txtPwd" required="true"/>
				<br/>
                <br/>
                <input type="submit" value="Enviar" name="btnEnviar"></input>
           </form>
		   </br>
		</div>
    </body>

		<br>
	</body> 
	
</html>


