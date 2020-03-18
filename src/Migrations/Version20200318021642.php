<?php

declare(strict_types=1);

namespace Douglas\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200318021642 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Curso (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE curso_aluno (curso_id INT NOT NULL, aluno_id INT NOT NULL, INDEX IDX_6F96721A87CB4A1F (curso_id), INDEX IDX_6F96721AB2DDF7F4 (aluno_id), PRIMARY KEY(curso_id, aluno_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE curso_aluno ADD CONSTRAINT FK_6F96721A87CB4A1F FOREIGN KEY (curso_id) REFERENCES Curso (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE curso_aluno ADD CONSTRAINT FK_6F96721AB2DDF7F4 FOREIGN KEY (aluno_id) REFERENCES Aluno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE aluno CHANGE nome nome VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE telefone CHANGE aluno_id aluno_id INT DEFAULT NULL, CHANGE numero numero VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE telefone ADD CONSTRAINT FK_D8448137B2DDF7F4 FOREIGN KEY (aluno_id) REFERENCES Aluno (id)');
        $this->addSql('CREATE INDEX IDX_D8448137B2DDF7F4 ON telefone (aluno_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE curso_aluno DROP FOREIGN KEY FK_6F96721A87CB4A1F');
        $this->addSql('DROP TABLE Curso');
        $this->addSql('DROP TABLE curso_aluno');
        $this->addSql('ALTER TABLE Aluno CHANGE nome nome VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE Telefone DROP FOREIGN KEY FK_D8448137B2DDF7F4');
        $this->addSql('DROP INDEX IDX_D8448137B2DDF7F4 ON Telefone');
        $this->addSql('ALTER TABLE Telefone CHANGE aluno_id aluno_id INT NOT NULL, CHANGE numero numero VARCHAR(30) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
    }
}
