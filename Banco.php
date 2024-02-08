<?php 
$servidor = "localhost:3307";
$usuario = "root";
$senha = "2204ckss";
$banco = "blogpessoal";
$conn = new mysqli($servidor, $usuario, $senha, $banco);
if ($conn->connect_error){
    die("Conexão falhou:".$conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="registro.css">
</head>
<body>
    <h2>Registros</h2>
    <form method="post" action="">
    <label for="username">Usuário:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Registrar">
    </form>
    
</body>
</html>