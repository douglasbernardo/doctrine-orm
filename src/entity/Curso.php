<?php

namespace Douglas\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */

class Curso{

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
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos")
     */
    private $alunos;

    public function __construct()
    {
        $this->alunos = new ArrayCollection();
        
    }
    public function getId() : int
    {
        return $this->id;
    }
    public function getNome() : string
    {
        return $this->nome;
    }
    public function  setNome(string $nome) : self
    {
        $this->nome = $nome;
        return $this;
    }

    public function addAluno(Aluno $aluno)
    {
        //Se o aluno ja existir na lista deste curso não ira fazer nada e continuar o comando do codigo
        if($this->alunos->contains($aluno)){
            return $this;
        }
        $this->alunos->add($aluno);
        return $this;
    }

    public function getAlunos()
    {
        return $this->alunos;
    }

}

