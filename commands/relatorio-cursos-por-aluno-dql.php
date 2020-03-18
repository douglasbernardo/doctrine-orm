<?php

use Doctrine\DBAL\Logging\DebugStack;
use Douglas\Doctrine\Entity\Aluno;
use Douglas\Doctrine\Entity\Telefone;
use Douglas\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$classeAluno = Aluno::class;
$dql= "SELECT a, t, c FROM $classeAluno a JOIN a.telefones t JOIN a.cursos c";
$query = $entityManager->createQuery($dql);

/** @var Aluno[] $alunos */
$alunos = $query->getResult();

foreach($alunos as $aluno){

    $telefone = $aluno->getTelefones()->map(function(Telefone $telefone){
        return $telefone->getNumero();
    })
    ->toArray();
    echo "ID : {$aluno->getId()}\n";
    echo "Nome : {$aluno->getNome()}\n";
    echo "Telefone: " . implode(",", $telefone);

    $cursos = $aluno->getCursos();

    foreach($cursos as $curso){
        echo "\tID Curso : {$curso->getId()}\n";
        echo "\tNome : {$curso->getNome()}\n";
        echo "\n";
    }
    echo "\n";
}
echo "\n";

foreach($debugStack->queries as $queryInfo){

    echo $queryInfo['sql'] . "\n";

}