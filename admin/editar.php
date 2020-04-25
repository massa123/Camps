<?php session_start();
require 'config.php';
require '../functions.php';

comprobarSession();

$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = limpiarDatos($_POST['nombre']);
	$especialidad = limpiarDatos($_POST['especialidad']);
    $horario_de_atencion = $_POST['horario de atencion'];
	$id = limpiarDatos($_POST['id']);

	$statement = $conexion->prepare('UPDATE medicos SET nombre = :nombre, especialidad = :especialidad, horario de atencion = :horario de atencion, WHERE id = :id');
	$statement->execute(array(
		':nombre' => $nombre,
		':especialidad' => $especialidad,
		':horario de atencion' => $horario_de_atencion,
		':id' => $id
	));

	header("Location: " . RUTA . '/admin_medicos.php');
} else {
	$id_medico = id_medico($_GET['id']);

	if (empty($id_medico)) {
		header('Location: ' . RUTA . '/admin.medicos.php');
	}
    
    $medico = obtener_medico_por_id($conexion, $id_medico);
    
	if (!$post) {
		header('Location: ' . RUTA . '/admin/index.php');
	}
	$medico = $medico[0];
}


require '../views/editar.view.php';

?>