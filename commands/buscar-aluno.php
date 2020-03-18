<?php


use Douglas\Doctrine\Entity\Aluno;
use Douglas\Doctrine\Entity\Telefone;
use Douglas\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$EntityManagerFactory = new EntityManagerFactory();
$EntityManager = $EntityManagerFactory->getEntityManager();

$dql = "SELECT aluno FROM Douglas\\Doctrine\\Entity\\Aluno aluno WHERE aluno.id = 13 or aluno.nome = 'Douglas Bernardo' ";
$query = $EntityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach($alunoList as $aluno){
    $telefones = $aluno->getTelefones()->map(function(Telefone $telefone){
      return $telefone->getNumero();  
    })
    ->toArray();
    echo "ID: {$aluno->getid()}\nNome : {$aluno->getNome()}\nIdade: {$aluno->getIdade()}\n";
    echo "Telefone : "  . implode(',',$telefones) . "\n\n";
}