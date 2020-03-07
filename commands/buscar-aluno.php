<?php


use Douglas\Doctrine\Entity\Aluno;
use Douglas\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$EntityManagerFactory = new EntityManagerFactory();
$EntityManager = $EntityManagerFactory->getEntityManager();

$alunoRepository = $EntityManager->getRepository(Aluno::class);

/** @var aluno[] $alunoList */

$alunoList = $alunoRepository->findAll();

foreach($alunoList as $aluno){
    echo "ID: {$aluno->getid()}\nNome : {$aluno->getNome()}\nIdade: {$aluno->getIdade()}\n\n";
}