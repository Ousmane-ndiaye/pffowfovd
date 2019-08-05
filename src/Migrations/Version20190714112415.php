<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190714112415 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, plan_id INT DEFAULT NULL, presentation LONGTEXT NOT NULL, taille_entreprise INT DEFAULT NULL, siege_social VARCHAR(200) DEFAULT NULL, logo LONGTEXT DEFAULT NULL, tel VARCHAR(25) DEFAULT NULL, website LONGTEXT DEFAULT NULL, twitter LONGTEXT DEFAULT NULL, linkedin LONGTEXT DEFAULT NULL, date_fondation VARCHAR(10) DEFAULT NULL, type VARCHAR(200) NOT NULL, INDEX IDX_D19FA60E899029B (plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnes (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, entreprise_id INT DEFAULT NULL, poste VARCHAR(200) NOT NULL, INDEX IDX_2BB4FE2BA76ED395 (user_id), INDEX IDX_2BB4FE2BA4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, prix INT NOT NULL, duree VARCHAR(25) DEFAULT NULL, offres JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60E899029B FOREIGN KEY (plan_id) REFERENCES plan (id)');
        $this->addSql('ALTER TABLE personnes ADD CONSTRAINT FK_2BB4FE2BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE personnes ADD CONSTRAINT FK_2BB4FE2BA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE personnes DROP FOREIGN KEY FK_2BB4FE2BA4AEAFEA');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60E899029B');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE personnes');
        $this->addSql('DROP TABLE plan');
    }
}
