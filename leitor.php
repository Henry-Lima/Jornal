<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="leitor.css">
</head>
<body>

<?php
session_start();
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 'leitor') {
    header('Location: index.php');
    exit;
}

$host  = "localhost:3306";
$user  = "root";
$pass  = "";
$base  = "jornal";
$conexao = mysqli_connect($host, $user, $pass, $base);

if (!$conexao) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

$query = "SELECT * FROM materia WHERE status = 'aprovada'";
$resultado = mysqli_query($conexao, $query);

if (mysqli_num_rows($resultado) == 0) {
    echo "Não há matérias aprovadas.";
}else {


    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "
            <header>
                <div class='cabecalho'>
                    <p id='data'>Data: " . $row['data'] . "</p>
                    <p id='escritor'>Nome do escritor: " . $row['nom_esc'] . "</p>
                </div>
                <h1 id='titulo'>NOME DO JORNAL</h1>
            </header>
            <div class='manchete_div'>
                <h2 class='manchete'>" . $row['manchete'] . "</h2>
            </div>
            <img src='" . $row['imagem'] . "' alt='Imagem da matéria' style='max-width: 100%;'>
            <div class='div_resumo'>
                <p id='resumo'>" . $row['res_mat'] . "</p>
            </div>
            <div class='texto'>
                <p>" . $row['text_mat'] . "</p>
            </div>";
    }
    }

mysqli_close($conexao);
?>
    
</body>
</html>