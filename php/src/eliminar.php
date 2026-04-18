<?php
session_start();
if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["rol"] !== "admin") { header("Location: index.php"); exit(); }
$conn = new mysqli("contenedor_mysql", "phpuser", "php1234", "usuariosdb");
$id = $_GET["id"];
$stmt = $conn->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
header("Location: dashboard.php"); exit();
?>
