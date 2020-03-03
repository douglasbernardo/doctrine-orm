<?php

namespace Douglas\Doctrine\Entity;

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
}