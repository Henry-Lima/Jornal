<?php
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


// <h1>Selecione uma imagem para fazer o upload</h1>
    
//     <!-- Formulário para envio de imagem -->
//     <form action="index.php" method="POST" enctype="multipart/form-data">
//         <label for="imagem">Escolha uma imagem:</label>
//         <input type="file" id="imagem" name="imagem" accept="image/*" required>
//         <br><br>
        
//         <button type="submit">Enviar Imagem</button>
//     </form>

?>