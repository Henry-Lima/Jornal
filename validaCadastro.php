<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
   $login = $_POST['login'];
   $senhaAluno = $_POST['senha'];
   $host = "localhost:3306";
   $user = "root";
   $pass = "";
   $base = "usuarios";
   $conexao = mysqli_connect($host, $user, $pass, $base);
   $sql = "select * from login where email = '$login' AND senha = '$senha'";
   $resultado = mysqli_query($conexao, $sql);

   if ( mysqli_num_rows($resultado) > 0)
   
   {
        echo "Acesso liberado";
    }
    else
    {
            echo "Acesso negado";
        }
  ?>
</body>
</html>