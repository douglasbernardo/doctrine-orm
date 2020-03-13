<?php

use Douglas\Doctrine\Entity\Aluno;
use Douglas\Doctrine\Entity\Telefone;
use Douglas\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$aluno = new Aluno();
$aluno->setNome($argv[1]);
$aluno->setIdade($argv[2]);

for($i = 3; $i < $argc;$i++){
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();
    $telefone->setNumero($numeroTelefone);

    $entityManager->persist($telefone);
    $aluno->addTelefone($telefone);
}

$entityManager->persist($aluno);

$entityManager->flush();
