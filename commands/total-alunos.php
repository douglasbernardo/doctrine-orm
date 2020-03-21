<?php

use Douglas\Doctrine\Entity\Aluno;
use Douglas\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$repository = $entityManager->getRepository(Aluno::class);

$classeAluno = Aluno::class;
//contar a quantidade de a => alunos
$dql = "SELECT COUNT(a) FROM $classeAluno a";
$query = $entityManager->createQuery($dql);
$totalAlunos = $query->getSingleScalarResult();


//var_dump($mediaIdade)
echo "Total de Aluno : " . $totalAlunos;