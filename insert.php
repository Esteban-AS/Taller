<?php
$serverName = "tiusr21pl.cuc-carrera-ti.ac.cr\MSSQLSERVER2019";
$dataBase = "jairoquesada";
$pass = "1245123jairo";
$user = "jairo";

try {
        $conn = new PDO("sqlsrv:Server=$serverName;Database={$dataBase}", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

		$conn = null; 
        
        Header("Location: index.php");
        


    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
?>