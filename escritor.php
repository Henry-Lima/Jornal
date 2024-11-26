<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="escritor.css">
    <title>Document</title>
</head>
<body>

<header>
    <a href="index.php"><img id="img" src="voltar.png" alt=""></a>
    <h1> <center>Criar Matéria</center></h1>
  </header>

    <form action="validaCadastro.php" method="POST">
        
    <label class="label" for="data">Data:</label>
        <input class="input" name="data" id="data" type="date">
    
    <label class="label" for="nom_esc">Nome do Escritor</label>
        <input class="input" name="nom_esc" id="nom_esc" type="text">
    
    <label class="label" for="manchete">Manchete:</label>
        <input class="input" name="manchete" id="manchete" type="text">
    
    <label class="label" for="res_mat">Resumo da Matéria:</label>
        <input class="input" name="res_mat" id="res_mat" type="text">

    <label for="imagem">Escolha uma imagem:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*" required>
    
    <label class="label" for="text_mat">Texto da matéria</label>
        <input class="input" name="text_mat" id="text_mat" type="text">

    <input id="btn" type="submit" value="Enviar">


    </form>
</body>
</html>

<?php


?>