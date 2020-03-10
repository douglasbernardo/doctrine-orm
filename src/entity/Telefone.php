<?php

use Douglas\Doctrine\Entity;
use Douglas\Doctrine\Entity\Aluno;

/**
 * @Entity
 */

class Telefone{

      /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $numero;

    /**
     * @ManyToOne(targetEntity="Aluno")
     */
    private $aluno;

    public function getId() : int 
    {
        return $this->Id;
    }
    public function setId(int $id) : self
    {
        return $this->Id;

    }
    public function getNumero() : string
    {
        return $this->numero;

    }
    public function setNumero(string $numero) : self{

        return $this->Numero;
    }
    public function getAluno() : Aluno
    {
        return $this->aluno;
    }
    public function setAluno(Aluno $aluno) : self
    {
        $this->aluno = $aluno;
        return $this;
    }

}
?>