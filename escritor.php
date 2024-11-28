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

    <form action="validaMateria.php" method="POST">
        
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
        
        <label for="text_mat">Texti da matéria:</label>
            <textarea id="text_mat" name="text_mat" rows="5" cols="50" placeholder="Digite aqui..."></textarea>

        <input id="btn" type="submit" value="Enviar">


    </form>
</body>
</html>

<?php

    session_start();
    if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 'escritor') {
        header('Location: index.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Verifica se um arquivo foi enviado
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            
            // Pega as informações do arquivo
            $nomeArquivo = $_FILES['imagem']['name'];
            $tipoArquivo = $_FILES['imagem']['type'];
            $tamanhoArquivo = $_FILES['imagem']['size'];
            $caminhoTemp = $_FILES['imagem']['tmp_name'];
    
            // Define o diretório onde a imagem será salva
            $diretorioDestino = 'uploads/';
            
            // Garante que o diretório de uploads existe
            if (!file_exists($diretorioDestino)) {
                mkdir($diretorioDestino, 0777, true);
            }
    
            // Define o caminho final para salvar a imagem
            $caminhoDestino = $diretorioDestino . basename($nomeArquivo);
    
            // Verifica se o arquivo é uma imagem real
            $imagemValida = getimagesize($caminhoTemp);
            if ($imagemValida === false) {
                die("O arquivo não é uma imagem válida.");
            }
    
            // Verifica se o arquivo já existe
            if (file_exists($caminhoDestino)) {
                die("Erro: O arquivo já existe.");
            }
    
            // Verifica o tamanho do arquivo (limite de 5MB, por exemplo)
            if ($tamanhoArquivo > 5 * 1024 * 1024) {
                die("Erro: O arquivo é muito grande. O tamanho máximo permitido é 5MB.");
            }
    
            // Tenta mover o arquivo para o diretório final
            if (move_uploaded_file($caminhoTemp, $caminhoDestino)) {
                echo "A imagem foi enviada com sucesso!";
                echo "<br><br>";
                echo "<img src='$caminhoDestino' alt='Imagem enviada' style='max-width: 100%; max-height: 400px;'>";
            } else {
                echo "Erro ao enviar a imagem.";
            }
        } else {
            echo "Erro: Nenhum arquivo foi enviado ou ocorreu um erro no upload.";
        }
    }

?>