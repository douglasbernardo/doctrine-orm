<?php


namespace Douglas\Doctrine\Entity;

use Douglas\Doctrine\Entity\Curso;

use Douglas\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$idAluno = $argv[1];
$idCurso = $argv[2];

/** @var Curso $curso */
$curso = $entityManager->find(Curso::class, $idCurso);

/** @var Aluno $aluno */
$aluno = $entityManager->find(Aluno::class, $idAluno);

$aluno->addCursos($curso);

$entityManager->flush();