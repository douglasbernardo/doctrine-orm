<?php

use Douglas\Doctrine\Entity\Aluno;
use Douglas\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$novoNome = $argv[2];
$novaIdade = $argv[3];

$aluno = $entityManager->find(Aluno::class, $id);

$aluno->setNome($novoNome);
$aluno->setIdade($novaIdade);


$entityManager->flush();