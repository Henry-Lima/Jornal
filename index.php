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
    <form action="validaCadastro.php" method="POST">
         <label for="user">Login:</label>
        <input type="text" name="user" id="user">


        <label for="senha">Senha:</label>
        <input type="text" name="senha" id="senha">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>