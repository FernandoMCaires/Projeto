<?php

namespace App\Models;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

#[Entity]
#[Table(name: 'matriculas')]
class Matricula
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    private int $id;

    #[ManyToOne(targetEntity: Aluno::class)]
    #[JoinColumn(name: 'aluno_id', referencedColumnName: 'id', nullable: false)]
    private Aluno $aluno;

    #[ManyToOne(targetEntity: Curso::class)]
    #[JoinColumn(name: 'curso_id', referencedColumnName: 'id', nullable: false)]
    private Curso $curso;

    #[Column(name: 'data_matricula', type: 'datetime')]
    private \DateTime $dataMatricula;

    #[Column(type: 'string', length: 20)]
    private string $status;

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getAluno(): Aluno
    {
        return $this->aluno;
    }

    public function getCurso(): Curso
    {
        return $this->curso;
    }

    public function getDataMatricula(): \DateTime
    {
        return $this->dataMatricula;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    // Setters
    public function setAluno(Aluno $aluno): void
    {
        $this->aluno = $aluno;
    }

    public function setCurso(Curso $curso): void
    {
        $this->curso = $curso;
    }

    public function setDataMatricula(\DateTime $dataMatricula): void
    {
        $this->dataMatricula = $dataMatricula;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
