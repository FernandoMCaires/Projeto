<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'matriculas')]
class Matricula
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Aluno::class)]
    #[ORM\JoinColumn(name: 'aluno_id', referencedColumnName: 'id', nullable: false)]
    private Aluno $aluno;

    #[ORM\ManyToOne(targetEntity: Curso::class)]
    #[ORM\JoinColumn(name: 'curso_id', referencedColumnName: 'id', nullable: false)]
    private Curso $curso;

    #[ORM\Column(name: 'data_matricula', type: 'datetime')]
    private \DateTime $dataMatricula;

    #[ORM\Column(type: 'string', length: 20)]
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
