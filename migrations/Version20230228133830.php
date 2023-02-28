<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228133830 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student ADD idclassroom_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3324D7AAA1 FOREIGN KEY (idclassroom_id) REFERENCES classroom (id)');
        $this->addSql('CREATE INDEX IDX_B723AF3324D7AAA1 ON student (idclassroom_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3324D7AAA1');
        $this->addSql('DROP INDEX IDX_B723AF3324D7AAA1 ON student');
        $this->addSql('ALTER TABLE student DROP idclassroom_id');
    }
}
