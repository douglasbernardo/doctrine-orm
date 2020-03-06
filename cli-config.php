<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Douglas\Doctrine\Helper\EntityManagerFactory;

// replace with file to your own project bootstrap
//It was changed
require_once __DIR__ . '/vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your 
//It was changed
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
