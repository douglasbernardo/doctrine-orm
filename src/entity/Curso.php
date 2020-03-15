<?php

namespace Douglas\Doctrine\Entity;
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

}

