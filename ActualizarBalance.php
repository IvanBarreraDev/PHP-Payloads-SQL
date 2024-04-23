php
$servername = mysql;
$username = root;
$password = TestPass123!;
$database = HarborBankUsers;

 Establecer conexión
$conn = mysqli_connect($servername, $username, $password, $database);

 Verificar la conexión
if (!$conn) {
    die(Conexión fallida  . mysqli_connect_error());
}

 ID del usuario que deseas actualizar
$user_id = 12;

 Nuevo balance del usuario
$new_balance = 9999999999999;

 Actualizar el balance del usuario
$sql = UPDATE users SET balance = $new_balance WHERE id = $user_id;

if (mysqli_query($conn, $sql)) {
    echo Balance actualizado exitosamente;
} else {
    echo Error al actualizar el balance  . mysqli_error($conn);
}

 Cerrar conexión
mysqli_close($conn);
