<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dato1 = $_POST['dato1'];
    $dato2 = $_POST['dato2'];

    // Puedes procesar los datos aquí, por ejemplo, guardarlos en la base de datos

    // Devuelve una respuesta en JSON
    echo json_encode(['status' => 'success', 'dato1' => $dato1, 'dato2' => $dato2]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
}
?>
