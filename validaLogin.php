<?php
session_start(); // Iniciar a sessão

// Dados do formulário
$login = $_POST['user'];
$senha = $_POST['senha'];

// Conexão com o banco
$host = "localhost";
$user = "root";
$pass = "";
$base = "jornal";

$conexao = new mysqli($host, $user, $pass, $base);

// Verificando erros na conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Verificando se o email e senha correspondem
$sql = "SELECT * FROM login WHERE email = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificando se o usuário existe e a senha está correta
if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    // Verificando a senha com o hash
    if (password_verify($senha, $usuario['senha'])) {
        // Sessão para o usuário logado
        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['tipo_usuario'] = $usuario['tipo']; 

        // Redirecionando com base no tipo de usuário
        if ($_SESSION['tipo_usuario'] == 'leitor') {
            header("Location: leitor.php"); 
        } elseif ($_SESSION['tipo_usuario'] == 'escritor') {
            header("Location: escritor.php"); 
        } elseif ($_SESSION['tipo_usuario'] == 'administrador') {
            header("Location: administrador.php"); 
        }
        exit;
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

$stmt->close();
$conexao->close();
?>