<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = "root";
$password = "";
$servername = "localhost";
$database = "interestelar";

$conexion = new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql_personajes = "SELECT id_personaje, nombre FROM personajes";
$result_personajes = $conexion->query($sql_personajes);

$sql_planetas = "SELECT id_planeta, nombre_planeta FROM planetas";
$result_planetas = $conexion->query($sql_planetas);

$sql_naves = "SELECT id_nave, nombre_nave FROM naves";
$result_naves = $conexion->query($sql_naves);

$sql_misiones = "SELECT id_mision, nombre_mision FROM misiones";
$result_misiones = $conexion->query($sql_misiones);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interestelar - Agregar Datos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:#87CEEB;
        }
        .container1 {
            width: 80%;
            margin: auto;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .container1 h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        label {
            font-weight: bold;
            color: #495057;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #A9A9A9 ;
            color: #ffffff;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #4B0082;
            cursor: pointer;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light" style="background-color:rgb(27, 227, 160)">
            <div class="container">
                <a class="navbar-brand" href="index.html" style="background-color: rgb(27, 227, 160);">Inicio</a>
    
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 1</a>
    
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="merary01.php">pagina 1</a><br>
                                <a class="dropdown-item" href="merary02.php">pagina 2</a><br>
                                <a class="dropdown-item" href="merary03.php">pagina 3</a><br>
                            </div>
                        </li>
    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 2</a>
    
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="merary04.php">pagina 4</a><br>
                                <a class="dropdown-item" href="merary05.php">pagina 5</a><br>
                                <a class="dropdown-item" href="merary06.php">Proyecto Primavera</a><br>
                            </div>
                        </li>
    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 3</a>
    
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="merary07.html">Pokedex</a><br>
                                <a class="dropdown-item" href="merary08.html">Peliculas API</a><br>
                                <a class="dropdown-item" href="merary09.html">Dragon Ball API</a><br>
                                <a class="dropdown-item" href="merary10.html">Harry Potter & Rick and Morty API</a><br>
                            </div>
                        </li>
    
                        
                    </ul>
                </div>
                
    
            </div>
        </nav>

    <div class="container1">
        <h1>Agregar Datos</h1>
        <form method="POST">
            <label for="nombre_personaje">Nombre del Personaje:</label>
            <input type="text" id="nombre_personaje" name="nombre_personaje" required>

            <label for="rol">Rol:</label>
            <input type="text" id="rol" name="rol" required>

            <label for="actor">Actor:</label>
            <input type="text" id="actor" name="actor" required>

            <label for="nombre_planeta">Nombre del Planeta:</label>
            <input type="text" id="nombre_planeta" name="nombre_planeta" required>

            <label for="habitabilidad">Habitabilidad:</label>
            <select id="habitabilidad" name="habitabilidad" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>

            <label for="nombre_nave">Nombre de la Nave:</label>
            <input type="text" id="nombre_nave" name="nombre_nave" required>

            <label for="capacidad_tripulacion">Capacidad de la Tripulación:</label>
            <input type="number" id="capacidad_tripulacion" name="capacidad_tripulacion" required>

            <input type="submit" value="Agregar Datos">
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre_personaje = $conexion->real_escape_string($_POST["nombre_personaje"]);
    $rol = $conexion->real_escape_string($_POST["rol"]);
    $actor = $conexion->real_escape_string($_POST["actor"]);
    $nombre_planeta = $conexion->real_escape_string($_POST["nombre_planeta"]);
    $habitabilidad = $conexion->real_escape_string($_POST["habitabilidad"]);
    $nombre_nave = $conexion->real_escape_string($_POST["nombre_nave"]);
    $capacidad_tripulacion = $conexion->real_escape_string($_POST["capacidad_tripulacion"]);

    
    $sql_insert_personaje = "INSERT INTO personajes (nombre, rol, actor) VALUES ('$nombre_personaje', '$rol', '$actor')";
    $sql_insert_planeta = "INSERT INTO planetas (nombre_planeta, habitabilidad) VALUES ('$nombre_planeta', '$habitabilidad')";
    $sql_insert_nave = "INSERT INTO naves (nombre_nave, capacidad_tripulacion) VALUES ('$nombre_nave', '$capacidad_tripulacion')";


    if ($conexion->query($sql_insert_personaje) === TRUE && $conexion->query($sql_insert_planeta) === TRUE && $conexion->query($sql_insert_nave) === TRUE) {
        echo "<p class='text-success'>Datos agregados exitosamente.</p>";
    } else {
        echo "<p class='text-danger'>Error al agregar los datos: " . $conexion->error . "</p>";
    }
}
?>
<div class="container">
    <h1 class="text-center">Datos Combinados</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre del Personaje</th>
                <th>Rol</th>
                <th>Actor</th>
                <th>Planeta</th>
                <th>Habitabilidad</th>
                <th>Nave</th>
                <th>Capacidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql = "SELECT 
                        p.nombre AS personaje, 
                        p.rol, 
                        p.actor, 
                        pl.nombre_planeta AS planeta, 
                        pl.habitabilidad, 
                        n.nombre_nave AS nave, 
                        n.capacidad_tripulacion AS capacidad
                    FROM personajes p
                    LEFT JOIN planetas pl ON pl.id_planeta = p.id_personaje
                    LEFT JOIN naves n ON n.id_nave = p.id_personaje";
            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['personaje']}</td>
                            <td>{$row['rol']}</td>
                            <td>{$row['actor']}</td>
                            <td>{$row['planeta']}</td>
                            <td>" . ($row['habitabilidad'] ? 'Sí' : 'No') . "</td>
                            <td>{$row['nave']}</td>
                            <td>{$row['capacidad']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>No hay datos registrados</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>