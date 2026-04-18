<?php
session_start();
$host = "contenedor_mysql";
$db = "usuariosdb";
$user = "phpuser";
$pass = "php1234";
$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_error) { die("Error: " . $conn->connect_error); }
$email = $_POST["email"];
$password = md5($_POST["password"]);
$sql = "SELECT u.*, r.nombre as rol FROM usuarios u JOIN roles r ON u.id_rol = r.id_rol WHERE u.email = ? AND u.password = ? AND u.activo = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 1) {
$usuario = $result->fetch_assoc();
$_SESSION["usuario"] = $usuario;
$ip = $_SERVER["REMOTE_ADDR"];
$id = $usuario["id_usuario"];
$sql2 = "INSERT INTO sesiones (id_usuario, ip) VALUES (?, ?)";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("is", $id, $ip);
$stmt2->execute();
$accion = "Login exitoso";
$sql3 = "INSERT INTO logs (id_usuario, accion) VALUES (?, ?)";
$stmt3 = $conn->prepare($sql3);
$stmt3->bind_param("is", $id, $accion);
$stmt3->execute();
header("Location: dashboard.php");
exit();
} else {
header("Location: index.php?error=1");
exit();
}
?>
