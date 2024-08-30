<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (empty($nome) || empty($email) || empty($senha)) {
        die('Todos os campos são obrigatórios.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Email inválido.');
    }

    if (strlen($senha) < 8) {
        die('A senha deve conter pelo menos 8 caracteres.');
    }

    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

    $dsn = 'pgsql:host=localhost;port=5432;dbname=banco_de_dados';
    $usuario = 'lavinia';
    $senha = '11055460';

    try {
        $pdo = new PDO($dsn, $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha, data_criacao) VALUES (:nome, :email, :senha, NOW())");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hashedSenha);

        if ($stmt->execute()) {
            echo 'Usuário cadastrado com sucesso!';
        } else {
            echo 'Erro ao cadastrar usuário.';
        }
    } catch (PDOException $e) {
        echo 'Erro de conexão: ' . $e->getMessage();
    }
} else {
    die('Método de requisição inválido.');
}
?>
