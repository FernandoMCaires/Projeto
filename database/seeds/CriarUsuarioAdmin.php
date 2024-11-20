<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$pdo = new PDO("mysql:host=localhost;dbname=admin", "root", "root");

// Primeiro, deleta o usuário admin se existir
$pdo->exec("SET SQL_SAFE_UPDATES = 0");
$stmt = $pdo->prepare("DELETE FROM usuarios WHERE email = ?");
$stmt->execute(['admin@exemplo.com']);
$pdo->exec("SET SQL_SAFE_UPDATES = 1");

// Depois, cria o novo usuário admin
$senha = password_hash('admin123', PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
$stmt->execute(['Admin', 'admin@exemplo.com', $senha]);

echo "Usuário admin recriado com sucesso!\n";

