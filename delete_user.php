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

        $id = $row['id'];
        $Nombre = $row['Nombres'];
        $Apellido = $row['Apellidos'];
        $Telefono = $row['Telefono'];
        $Correo = $row['Correo'];
        $Estado = $row['Estado'];
        $Opcion  = 3;

        $procedureName = "CRUDClientes";

		$steament = $conn->prepare("{CALL $procedureName(?, ?, ?, ?, ?, ?, ?)}");
        
        $steament->bindParam(1, $id,PDO::PARAM_STR);
        $steament->bindParam(2, $Nombre,PDO::PARAM_STR);
        $steament->bindParam(3, $Apellido,PDO::PARAM_STR);
        $steament->bindParam(4, $Telefono,PDO::PARAM_STR);
        $steament->bindParam(5, $Correo,PDO::PARAM_STR);
        $steament->bindParam(6, $Estado,PDO::PARAM_STR);
        $steament->bindParam(7, $Opcion,PDO::PARAM_INT);

		$steament->execute();

        $conn = null; 
        
        Header("Location: index.php");
        


    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
?>