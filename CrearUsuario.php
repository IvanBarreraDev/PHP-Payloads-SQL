<?php
$servername = "mysql";
$username = "root";
$password = "TestPass123!";
$database = "HarborBankUsers";

// Establecer conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Crear un nuevo usuario
$username = "nuevo_usuario"; // Nombre de usuario del nuevo usuario
$password = "nueva_contraseña"; // Contraseña del nuevo usuario
$balance = 100; // Balance inicial del nuevo usuario

$sql = "INSERT INTO users (username, password, balance) VALUES ('$username', '$password', $balance)";

if (mysqli_query($conn, $sql)) {
    echo "Nuevo usuario creado exitosamente";
} else {
    echo "Error al crear usuario: " . mysqli_error($conn);
}

// Mostrar todos los usuarios existentes
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<br><br>Usuarios existentes:<br>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . " - Username: " . $row["username"] . " - Balance: " . $row["balance"] . "<br>";
    }
} else {
    echo "No se encontraron usuarios";
}

// Cerrar conexión
mysqli_close($conn);
?>