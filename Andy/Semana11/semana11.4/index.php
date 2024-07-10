<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<title>SESIONES EN PHP</title>
</head>
<body>
<form action="login.php" method="POST">
<label>USUARIO</label>
<input type="text" name="usuario" pattern="[a-zA-Z]{3,10}" maxlength="10">
<br><br>
<label>CLAVE</label>
<input type="password" name="clave" pattern="[a-zA-Z0-9$@.-]{4,30}" maxlength="30">
<br><br>
<button type="submit">INGRESAR</button>
</form>
</body>
</html>