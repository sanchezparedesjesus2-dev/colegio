<?php
$host = "mysql-sanchezjes212.alwaysdata.net"; 
$user = "440301"; 
$pass = "FLQ99hhMG"; 
$db = "sanchezjes212_100registros";

// Conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta de 100 registros
$sql = "SELECT * FROM personas LIMIT 100";
$result = $conn->query($sql);

echo "<h2>Listado de Personas</h2>";
echo "<table border='1' cellpadding='5'>
<tr>
<th>ID</th><th>Nombre</th><th>Apellido</th><th>Teléfono</th><th>Correo</th><th>Fecha Nac.</th><th>Ciudad</th><th>Promedio</th>
</tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["id_persona"]."</td>
        <td>".$row["nombre"]."</td>
        <td>".$row["apellido"]."</td>
        <td>".$row["telefono"]."</td>
        <td>".$row["correo"]."</td>
        <td>".$row["fecha_nacimiento"]."</td>
        <td>".$row["ciudad"]."</td>
        <td>".$row["promedio"]."</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No hay registros</td></tr>";
}

echo "</table>";

$conn->close();
?>