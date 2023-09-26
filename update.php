<?php
$serverName = "tiusr21pl.cuc-carrera-ti.ac.cr\MSSQLSERVER2019";
$dataBase = "jairoquesada";
$pass = "1245123jairo";
$user = "jairo";

try {
        $conn = new PDO("sqlsrv:Server=$serverName;Database={$dataBase}", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id=$_GET['id'];

        $Consulta = "SELECT * FROM clientes WHERE id=$id";

        $steamentListar = $conn->query($Consulta);

        $row = $steamentListar->fetch(PDO::FETCH_ASSOC);
	
		$conn = null; 

    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
?>


<!DOCTYPE html pageEncoding="UTF-8">
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>CRUD</title>
    <style>
        .btn-container a {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
    
</head>

<body>
	
	<nav class="cyan accent-4">
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo"><span class="text-primary">CRUD</span> Práctica</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="index.php">Regresar</a></li>
				</ul>
            </div>
        </nav>
    
        
	
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>