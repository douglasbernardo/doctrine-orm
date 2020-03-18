<?php

namespace Douglas\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Douglas\Doctrine\Entity\Telefone;

/**
 * @Entity
 */

class Aluno{

    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $nome;
    
    /**
     * @column(type="integer")
     */
    private $idade;

    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno")
     */
    private $telefones;

    /**
     * @ManyToMany(targetEntity="Curso", mappedBy="alunos")
     */
    private $cursos;

    public function __construct()
    {
        $this->telefones = new  ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

    public function getId() : int
    {

        return $this->id;
    }

    public function getNome() : string
    {
        return $this->nome;
    }
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getIdade() : int
    {
        return $this->idade;
    }

    public function setIdade(int $idade)
    {
        $this->idade = $idade;
    }

    public function addTelefone(Telefone $telefone) 
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        
        return $this;
    }

    public function getTelefones() : Collection 
    {
        return $this->telefones;
    }

    public function addCursos(curso $curso) : self
    {
        //Se o curso ja existir na lista ele não faz nada so continua executando o codigos
        if($this->cursos->contains($curso) )
        {
            return $this;
        }
        $this->cursos->add($curso);
        $curso->addAluno($this);

        return $this;
    }
    /** 
     * @return Curso[] 
     */
    public function getCursos() : Collection
    {
        return $this->cursos;
    }
}