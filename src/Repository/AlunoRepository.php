<?php 


namespace Douglas\Doctrine\Repository;
              
use Doctrine\ORM\EntityRepository;


class AlunoRepository extends EntityRepository
{

    public function BuscarCursoPorAluno()
    {
       $query = $this->createQueryBuilder('aluno')
        ->join('aluno.telefones' , 't')
        ->join('aluno.cursos', 'c') 
        ->addSelect('t')
        ->addSelect('c')
        ->getQuery();

        return $query->getResult();
    }



}