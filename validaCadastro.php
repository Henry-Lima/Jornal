<?php
// Dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo_usuario'];

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

// Verificando se o email já existe
$sqlVerifica = "SELECT * FROM login WHERE email = ?";
$stmtVerifica = $conexao->prepare($sqlVerifica);
$stmtVerifica->bind_param("s", $email);
$stmtVerifica->execute();
$resultado = $stmtVerifica->get_result();

if ($resultado->num_rows > 0) {
    echo "Erro: O email já está cadastrado.";
    exit;
}

// Gerando o hash da senha
$senhaHash = password_hash($senha, PASSWORD_BCRYPT);

// Inserindo os dados no banco
$sql = "INSERT INTO login (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssss", $nome, $email, $senhaHash, $tipo);

if ($stmt->execute()) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o usuário: " . $stmt->error;
}

// Fechando a conexão
$stmt->close();
$conexao->close();
?>