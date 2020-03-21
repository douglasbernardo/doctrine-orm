<?php

use Doctrine\DBAL\Logging\DebugStack;
use Douglas\Doctrine\Entity\Aluno;
use Douglas\Doctrine\Entity\Telefone;
use Douglas\Doctrine\Helper\EntityManagerFactory ;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunosRepository = $entityManager->getRepository(Aluno::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);
/**@var Aluno[] $alunos */
$alunos = $alunosRepository->BuscarCursoPorAluno();

/** @var Aluno [] $alunos */
$alunos = $alunosRepository->findAll();

foreach ($alunos as $aluno) {
    $telefones = $aluno->getTelefones()
        ->map(function (Telefone $telefone) {
        return $telefone->getNumero();

    })
    ->toArray();

    echo "ID: {$aluno->getId()}\n";
    echo "Nome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(",", $telefones) . "\n";

    $cursos = $aluno->getCursos();

    foreach ($cursos as $curso) {
        echo "ID Curso: {$curso->getId()}\n";
        echo "\tCurso: {$curso->getNome()}";
        echo "\n";
    }
    echo "\n";
}
