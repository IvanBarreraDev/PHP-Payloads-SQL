<?php
// Configuración de la base de datos
$servername = "mysql";
$username = "root";
$password = "TestPass123!";
$database = "HarborBankUsers";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener todas las tablas de la base de datos
$sql = "SHOW TABLES";
$result = $conn->query($sql);

// Verificar si hay tablas
if ($result->num_rows > 0) {
    // Iterar sobre cada tabla
    while ($row = $result->fetch_assoc()) {
        $table = $row['Tables_in_' . $database];

        // Consulta para obtener todos los datos de la tabla actual
        $table_data_sql = "SELECT * FROM $table";
        $table_data_result = $conn->query($table_data_sql);

        // Verificar si hay datos en la tabla
        if ($table_data_result->num_rows > 0) {
            // Imprimir el nombre de la tabla
            echo "<h2>Tabla: $table</h2>";

            // Crear una tabla HTML para mostrar los datos
            echo "<table border='1'>";
            // Encabezados de la tabla
            echo "<tr>";
            while ($field = $table_data_result->fetch_field()) {
                echo "<th>" . $field->name . "</th>";
            }
            echo "</tr>";
            // Filas de datos
            while ($row = $table_data_result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "La tabla $table está vacía.<br>";
        }
    }
} else {
    echo "No hay tablas en la base de datos.";
}

// Cerrar conexión
$conn->close();
?>