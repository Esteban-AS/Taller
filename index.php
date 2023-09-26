<?php
$serverName = "tiusr21pl.cuc-carrera-ti.ac.cr\MSSQLSERVER2019";
$dataBase = "jairoquesada";
$pass = "1245123jairo";
$user = "jairo";

try {
        $conn = new PDO("sqlsrv:Server=$serverName;Database={$dataBase}", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $procedureName = "ListarClientes";

		$steament = $conn->prepare("EXEC $procedureName");
	
		$steament->execute();
	
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
            </div>
        </nav>
	
   
 <div class="container">
        <div class="row">
            <div class="col s4">
                <div class="card-panel teal lighten-3 center-align">

                    <span class="card-title white-text">Complete la Información</span>

                </div>
				
                <form action='insert.php' method="POST">
                    <div class="row">
                        <div class="input-field col s6">
                            <input oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="13" name="txtIdentificacion" type="text" class="validate" required>
                            <label for="txtIdentificacion">Identificación</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input maxlength="50" name="txtNombres" type="text" class="validate" required>
                            <label for="txtNombres">Nombres</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input maxlength="100" name="txtApellidos" type="text" class="validate" required>
                            <label for="txtApellidos">Apellidos</label>
                        </div>

                    </div>


                    <div class="row">
                        <div class="input-field col s12">
                            <input oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="10" name="txtTelefono" type="text" class="validate" required>
                            <label for="txtTelefono">Teléfono</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input maxlength="100" name="txtCorreo" type="email" class="validate" required>
                            <label for="txtCorreo">Correo</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input name="txtEstado" type="text" pattern="[AI]" required>
                            <label for="txtEstado">Estado A: activo I:inactivo</label>
                        </div>


                    </div>

                    <div class="row">

                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="accion" value="Agregar">Agregar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>


            </div><!--Fin contenedor izquierdo-->
            <div class="col s8">

                <table class="highlight centered ">
                    <thead>
                        <tr>
                            <th>Identificación</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = $steament->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td class="text-center"><?= $row['id'] ?></td>
                        <td class="text-center"><?= $row['Nombres'] ?></td>
                        <td class="text-center"><?= $row['Apellidos'] ?></td>
                        <td class="text-center"><?= $row['Telefono'] ?></td>
                        <td class="text-center"><?= $row['Correo'] ?></td>
						<td class="text-center"><?= $row['Estado'] ?></td>
                        <td class="text-center">
                            <a class="waves-effect yellow btn-small" href="update.php?id=<?= $row['id'] ?>">Editar</a>
                            <a class="waves-effect red btn-small" href="delete_user.php?id=<?= $row['id'] ?>" >Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
                    </tbody>
                </table>
            </div><!--Fin contenedor grid-->
        </div>
    </div>



    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>