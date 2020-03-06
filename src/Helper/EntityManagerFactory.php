<?php

namespace Douglas\Doctrine\Helper;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;




class EntityManagerFactory
{

	public function getEntityManager(): EntityManagerInterface
	{
		/** return EntityManagerInterface */
		$rootDir = __DIR__ . '/../..';
		$config = Setup::createAnnotationMetadataConfiguration(
			[$rootDir . '/src'],
			 true
		);
		$connection = [
			'host' => 'localhost',
			'user' => 'root',
			'dbname' => 'aluno',
			'password' => 'douglas@melo',
			'driver' => 'mysqli',
			'path' => $rootDir . '/var/data/banco.sqlite'
		];
		return EntityManager::create($connection, $config);
	}	

}


