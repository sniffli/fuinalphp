
<html>
 <head>
 <font face="Comic Sans MS,arial">
 <font color="white">
  <title>PHP</title>
 </head>
 <body>
 <body bgcolor="#34656d">
 <br>
 <center>
 <?php echo '<p><H1>RECOPILACION DE PROGRAMAS</p></H1>'; ?>
 <hr align="mid" width="50%" size="10" noshade color="#e5d549">


    <style>
        
        #respuesta{
            width: 500px;
        }
        
    </style>

        <h1>Area y Perimetro</h1>
        <input type="image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/04-L_Cuadrado.svg/1200px-04-L_Cuadrado.svg.png"
        width="300"  height="300">
        <br>
        Lado : <input name="fig1" id="lado" type="text" >
        
        <input type="button" id = "Calcularea"  value="Calcular">
        </br>
        <input type="text" id = "respuesta"  value="" >
         
         <script>

 

        function calcularArea_perimetro(){
        var valor = document.getElementById('lado').value;
        var area = valor * valor;
        var perimetro = valor * 4;
        var respuesta = document.getElementById('respuesta').value = "el area del triangulo es "+ area + " el perimetro del cuadrado es " + perimetro ;
                                            }

        bt = document.getElementById('Calcularea');
        bt.addEventListener("click",calcularArea_perimetro);


        </script>
       </center>
	   <br>
	   <hr align="mid" width="50%" size="10" noshade color="#e5d549">

	<center>
		<h1>Calculadora</h1>
		<form action="final.php" method="post">
			<select name="operador">
				<option value="suma">Suma</option>
				<option value="resta">Resta</option>
				<option value="multiplicacion">Multiplicaci&oacute;n</option>
				<option value="division">Divisi&oacute;n</option>
			</select><br />
			Ingresa un numero:<br />
			<input type="text" name="valor1"><br />
			Ingresa otro numero:<br />
			<input type="text" name="valor2"><br>
			<input type="reset" value="Borrar">
			<input type="submit" value="Enviar">
		</form>
	
<?php 


	if ($_POST ["valor1"] !="" and $_POST ["valor2"]!=""){
		if ($_POST["operador"] == "suma") {
			print ($resultado = $_POST ["valor1"] + $_POST ["valor2"]);
			print ('<br /><a href="final.php">Volver</a>');
		} elseif ($_POST["operador"] == "resta") {
			print ($resultado = $_POST ["valor1"] - $_POST ["valor2"]);
			print ('<br /><a href="final.php">Volver</a>');
		} elseif ($_POST["operador"] == "multiplicacion") {
			print ($resultado = $_POST ["valor1"] * $_POST ["valor2"]);
			print ('<br /><a href="final.php">Volver</a>');
		} elseif ($_POST["operador"] == "division") {
			print ($resultado = $_POST ["valor1"] / $_POST ["valor2"]);
			print ('<br /><a href="final.php">Volver</a>');
		}
	} else {
        
		print("Ingresa alg&uacute;n valor");
		print ('<br /><a href="final.php">Volver</a>');
	}
 
    
?>
<?php
$servidor="localhost";
$usuario="root";
$clave="";
$baseDeDatos="carros";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if(!$enlace){
    echo "error en la conexion del sevidor";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CONEXION de base de datos</title>

</head>
<body>
    <div class="contenedor">
    <form class="formulario" id="formulario" method="POST">
    <ul>
    <li>
    <lable for="name">Nombre:</lable>
    <input type="text" id="nombre" name="nombre" />
    </li>
    </ul>
    </forms>
    </div>
    <h2>Tabla<a herf="edicion.php" class="liga">Datos</a></h2>
    <table border="2">
        <tr>
        <td>ID</td>
        <td>Nombre</td>

        <?php
        $consulta="SELECT * FROM carros";
        $ejecutarConsulta=mysqli_query($enlace, $consulta);
        $verfilas=mysqli_num_rows($ejecutarConsulta);
        $fila=mysqli_fetch_array($ejecutarConsulta);

        if(!$ejecutarConsulta){
            echo "error en conlulta";
        }else{
            if($verfilas<1){
                echo "<tr><td>Sin registros</td></tr>";
            }else{
                for($i=0; $i<=$fila; $i++){
                    echo'<tr>
                    <td>'.$fila[0].'</td>
                    <td>'.$fila[1].'</td>
                    </tr>';
                    $fila=mysqli_fetch_array($ejecutarConsulta);
                }
            }
        }
        ?>
        </tr>
        </table>
        </body>
        </html>
        <?php
        if(isset($_POST['enviar'])){
            $nombre=$_POST['nombre'];
            $id=rand(1,99);
            $insertardatos="INSERT INTO carros VALUES('$nombre','$mensaje')";

            $ejecutarInsertar=mysqli_query($enlace, $insertardatos);
            if(!$ejecutarInsertar){
                echo "error en la linea de sql";
            }
        }






