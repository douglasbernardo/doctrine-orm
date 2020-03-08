<?php

use Douglas\Doctrine\Entity\Aluno;
use Douglas\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$aluno = $entityManager->getReference(Aluno::class,$id);

$entityManager->remove($aluno);

$entityManager->flush();