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
    </header>
    <form action="validaLogin.php" method="POST">
         <label for="user">Login:</label>
        <input type="text" name="user" id="user">


        <label for="senha">Senha:</label>
        <input type="text" name="senha" id="senha">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>