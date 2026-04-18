<?php
session_start();
if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["rol"] !== "admin") { header("Location: index.php"); exit(); }
$conn = new mysqli("contenedor_mysql", "phpuser", "php1234", "usuariosdb");
$nombre = $_POST["nombre"]; $email = $_POST["email"]; $password = md5($_POST["password"]); $id_rol = $_POST["id_rol"];
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, id_rol) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $nombre, $email, $password, $id_rol);
$stmt->execute();
header("Location: dashboard.php"); exit();
?>
