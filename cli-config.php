<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Douglas\Doctrine\Helper\EntiryManagerFactory;

// replace with file to your own project bootstrap

require_once __DIR__ . '/vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your 
$entityManagerFactory = new EntiryManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
