<?php 


namespace Douglas\Doctrine\Repository;
              
use Doctrine\ORM\EntityRepository;
use Douglas\Doctrine\Entity\Aluno;

class AlunoRepository extends EntityRepository
{

    public function BuscarCursoPorAluno()
    {
        $classeAluno = Aluno::class;
        $entityManager = $this->getEntityManager();
        $dql = "SELECT a, b, c FROM $classeAluno a JOIN a.telefones t JOIN a.cursos c";
        $query = $entityManager->createQuery($dql);

        return $query->getResult();
    }



}