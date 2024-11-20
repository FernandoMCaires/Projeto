<?php

declare(strict_types=1);

namespace Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241120012544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Criação das tabelas iniciais do sistema';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, senha VARCHAR(255) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)');

        $this->addSql('CREATE TABLE cursos (id INT AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(255) NOT NULL, descricao TEXT NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)');

        $this->addSql('CREATE TABLE alunos (id INT AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL UNIQUE, data_nascimento DATE NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)');

        $this->addSql('CREATE TABLE matriculas (
            id INT AUTO_INCREMENT PRIMARY KEY,
            aluno_id INT NOT NULL,
            curso_id INT NOT NULL,
            data_matricula DATETIME NOT NULL,
            status VARCHAR(20) NOT NULL DEFAULT "Ativa",
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (aluno_id) REFERENCES alunos(id),
            FOREIGN KEY (curso_id) REFERENCES cursos(id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
    }

    public function down(Schema $schema): void
    {
        // Remove as tabelas na ordem inversa por causa das foreign keys
        $this->addSql('DROP TABLE IF EXISTS matriculas');
        $this->addSql('DROP TABLE IF EXISTS alunos');
        $this->addSql('DROP TABLE IF EXISTS cursos');
        $this->addSql('DROP TABLE IF EXISTS usuarios');
    }
}
