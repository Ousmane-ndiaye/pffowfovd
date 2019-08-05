<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190714114258 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entreprisesecteur (id INT AUTO_INCREMENT NOT NULL, secteur_id INT DEFAULT NULL, entreprise_id INT DEFAULT NULL, INDEX IDX_20607EAB9F7E4405 (secteur_id), INDEX IDX_20607EABA4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entreprisesecteur ADD CONSTRAINT FK_20607EAB9F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id)');
        $this->addSql('ALTER TABLE entreprisesecteur ADD CONSTRAINT FK_20607EABA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE entreprisesecteur');
    }
}
