<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=?, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header class="cabecalho">
        <h1 id="titulo">Nome do Jornal</h1>
        <img id="img" src="logout.png" alt="">
    </header>

    
    
    <?php 
        session_start();
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 'administrador') {
            header('Location: index.php');
            exit;
        }
    ?>
</body>
</html>