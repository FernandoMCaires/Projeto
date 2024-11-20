<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'alunos')]
class Aluno
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(name: 'nome', type: 'string', length: 100)]
    private string $nome;

    #[ORM\Column(name: 'email', type: 'string', length: 100)]
    private string $email;

    #[ORM\Column(name: 'data_nascimento', type: 'date')]
    private \DateTime $dataNascimento;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private \DateTime $createdAt;

    #[ORM\OneToMany(targetEntity: Matricula::class, mappedBy: 'aluno')]
    private Collection $matriculas;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->matriculas = new ArrayCollection();
    }

    // Getters e Setters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getDataNascimento(): \DateTime
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(\DateTime $dataNascimento): self
    {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    // Métodos para matrículas
    public function getMatriculas(): Collection
    {
        return $this->matriculas;
    }

    public function addMatricula(Matricula $matricula): self
    {
        if (!$this->matriculas->contains($matricula)) {
            $this->matriculas[] = $matricula;
            $matricula->setAluno($this);
        }
        return $this;
    }

    public function removeMatricula(Matricula $matricula): self
    {
        $this->matriculas->removeElement($matricula);
        return $this;
    }
}