<?php
/* Include Files *********************/ 
$dsn = "DB2_test";
$usuario = "DB2";
$clave="ACCESS";
$conectar=odbc_connect($dsn, $usuario, $clave);
if (!$conectar){
	exit("Ya ocurrido un error tratando de conectarse con el origen de datos.");
}
/*************************************/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kit Escolares</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link href="http://localhost:8080/kit-escolares/estilos/estilo.css" rel="stylesheet" type="text/css"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="contenedor">
		<!-- Logo STIA -->
        <img src="img/logoSTIA.jpg" alt="imagen-logo" id="logo">
        <section id="navegacion">
            <a href="kit.php" id="nro">NRO KIT</a>
            <a href="talle.php" id="talle">TALLE KIT</a>
        </section>
    </header>
	<main class="contenedor">
		<h2 id="titulares">Número de Kit</h2>
		<table class="table table-hover centrado">
			<thead>
    			<tr>
      				<th scope="col" id="titulo-colum">NRO</th>
      				<th scope="col" id="titulo-colum">CANTIDAD</th>
    			</tr>
  			</thead>
  			<?php
			$sql= "SELECT NRO_KIT, count(*) as CANTIDAD FROM kit_form GROUP BY NRO_KIT ORDER BY NRO_KIT ";
			$result=odbc_exec($conectar,$sql)or die(exit("Error en odbc_exec"));
			while ($registro = odbc_fetch_array($result)){
			?>
			<tbody id="datos">
    			<tr>
					<th scope="row"><?php echo $registro["NRO_KIT"]?></th>
					<td><?php echo $registro["CANTIDAD"]?></td>
					<?php
					}
					$sql2="SELECT count(*) as TOTAL FROM kit_form";
					$result2=odbc_exec($conectar,$sql2)or die(exit("Error en odbc_exec"));
					?>
				</tbody>
				<tbody id="datos">
				<td id ="total">TOTAL</td>
				<td  id ="total"><?php $registro2 = odbc_fetch_array($result2);
				 		         echo $registro2["TOTAL"];?></td>
				</tr>
			</tbody>	
		</table>
		</main>
		<script type="text/javascript">
			window.onload = function(){
			document.getElementById("nro").style.borderBottom = "solid 1px green";
			}
		</script>
		<img src="http://localhost:8080/kit-escolares/img/top.png" alt="imagen-footer" class="degradado">
		<footer id="footer">
			<p>Copyright &copy; 2020 S.T.I.A, todos los derechos reservados.</p>
		</footer>
	</body>
</html>