<?php
session_start();
require_once('Banco.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login_pessoal.php');
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (title, content, user_id) VALUES ('$title', '$content', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Postagem criada com sucesso!";
    } else {
        echo "Erro ao criar postagem: " . $conn->error;
    }
}

$sql = "SELECT * FROM posts WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bem-vindo ao Dashboard</h2>
    <form method="post" action="">
        <label for="title">Título:</label>
        <input type="text" name="title" required>
        <br>
        <label for="content">Conteúdo:</label>
        <textarea name="content" required></textarea>
        <br>
        <input type="submit" value="Criar Postagem">
    </form>

    <h3>Suas Postagens:</h3>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>{$row['title']}</strong><br>{$row['content']}</p>";
        }
    } else {
        echo "Nenhuma postagem encontrada.";
    }
    ?>
</body>
</html>
