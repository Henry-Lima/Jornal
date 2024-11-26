<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $data = $_POST["data"];
        $nome = $_POST["nom_esc"];   
        $manchete = $_POST["manchete"];
        $resumo = $_POST["res_mat"];
        $imagem = $_POST["imagem"];
        $texto = $_POST["text_mat"];

      // Conexão com banco
      $host  = "localhost:3306";
      $user  = "root";
      $pass  = "";
      $base  = "jornal";
      $conexao  = mysqli_connect($host, $user, $pass, $base);
      // Query
      $input = mysqli_query($conexao, "
        INSERT INTO materia (data, nom_esc, manchete, res_mat, imagem, text_mat  ) 
            VALUES ('$data', '$nome', '$manchete', '$resumo', '$imagem', '$');");

      mysqli_close($conexao); // Encerrando conexão com o banco
      echo "<center><h1>Cadastro realizado</h1></center>";
      // script para redirecionar o user para a pagina de exibição da tablela
      echo 
      "<script>
          setTimeout(function() {
          window.location.href = \"http://localhost/\";
          }, 1000);
      </script>";
    }
  ?>
</body>
</html>