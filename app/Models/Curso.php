<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'cursos')]
class Curso
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(name: 'nome', type: 'string')]
    private string $nome;

    #[ORM\Column(name: 'descricao', type: 'string')]
    private string $descricao;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private \DateTime $createdAt;

    #[ORM\OneToMany(targetEntity: Matricula::class, mappedBy: 'curso')]
    private Collection $matriculas;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->matriculas = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
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
               $matricula->setCurso($this);
           }
           return $this;
       }
   
       public function removeMatricula(Matricula $matricula): self
       {
           $this->matriculas->removeElement($matricula);
           return $this;
       }
}
