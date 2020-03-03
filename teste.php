<?php

use Douglas\Doctrine\Helper\EntiryManagerFactory;

require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntiryManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

var_dump($entityManager->getConnection());