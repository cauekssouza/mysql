<?php 
require_once("dashbord.php");
if($_SERVER['Request_Method'] == "POST"){
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (usuario, senha) VALUES('$usuario', '$senha')";
    if($conn->query($sql) === TRUE){
        echo "Usuario Registrado com sucesso!";
    } else{
        echo "Erro ao registrar usuário:".$conn->error;
    }
}
?>