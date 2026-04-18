<?php
session_start();
if(!isset($_SESSION["usuario"])) { header("Location: index.php"); exit(); }
$usuario = $_SESSION["usuario"];
$rol = $usuario["rol"];
$host = "contenedor_mysql"; $db = "usuariosdb"; $user = "phpuser"; $pass = "php1234";
$conn = new mysqli($host, $user, $pass, $db);
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Dashboard</title>
<style>
body { font-family: Arial; background: #f0f0f0; margin: 0; padding: 20px; }
.header { background: #4CAF50; color: white; padding: 20px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center; }
.card { background: white; padding: 20px; border-radius: 10px; margin-top: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
table { width: 100%; border-collapse: collapse; } th, td { padding: 10px; border: 1px solid #ddd; text-align: left; } th { background: #4CAF50; color: white; }
.btn { padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer; color: white; text-decoration: none; }
.btn-red { background: #f44336; } .btn-blue { background: #2196F3; }
.logout { color: white; background: #f44336; padding: 8px 15px; border-radius: 5px; text-decoration: none; }
.rol-badge { background: #e8f5e9; color: #333; padding: 5px 15px; border-radius: 20px; font-weight: bold; }
</style></head><body>
<div class="header"><div>
<?php echo "<h2>Bienvenido, " . $usuario["nombre"] . "</h2>"; ?>
<?php echo "<span class=\"rol-badge\">Rol: " . strtoupper($rol) . "</span>"; ?>
</div><a href="logout.php" class="logout">Cerrar sesion</a></div>
<div class="card">
<?php if($rol === "ingreso"): ?>
<h3>Bienvenido al sistema</h3>
<p>Tu cuenta tiene acceso basico. Contacta al administrador para mas permisos.</p>
<?php endif; ?>
<?php if($rol === "consulta" || $rol === "admin"): ?>
<h3>Lista de Usuarios</h3>
<?php
$result = $conn->query("SELECT u.id_usuario, u.nombre, u.email, r.nombre as rol FROM usuarios u JOIN roles r ON u.id_rol = r.id_rol");
echo "<table><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th>";
if($rol === "admin") echo "<th>Acciones</th>";
echo "</tr>";
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id_usuario"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["email"] . "</td><td>" . $row["rol"] . "</td>";
if($rol === "admin") {
echo "<td><a href=\"eliminar.php?id=" . $row["id_usuario"] . "\" class=\"btn btn-red\">Eliminar</a></td>";
}
echo "</tr>";
}
echo "</table>";
?>
<?php endif; ?>
<?php if($rol === "admin"): ?>
<h3 style="margin-top:20px">Agregar nuevo usuario</h3>
<form method="POST" action="agregar.php">
<input type="text" name="nombre" placeholder="Nombre" required style="padding:8px; margin:5px; border:1px solid #ddd; border-radius:5px;">
<input type="email" name="email" placeholder="Email" required style="padding:8px; margin:5px; border:1px solid #ddd; border-radius:5px;">
<input type="password" name="password" placeholder="Password" required style="padding:8px; margin:5px; border:1px solid #ddd; border-radius:5px;">
<select name="id_rol" style="padding:8px; margin:5px; border:1px solid #ddd; border-radius:5px;">
<option value="1">Admin</option>
<option value="2">Consulta</option>
<option value="3">Ingreso</option>
</select>
<button type="submit" class="btn btn-blue" style="padding:8px 15px; margin:5px;">Agregar</button>
</form>
<?php endif; ?>
</div></body></html>
