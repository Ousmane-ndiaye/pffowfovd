<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190624015435 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, entreprise VARCHAR(200) NOT NULL, intitule_poste VARCHAR(200) NOT NULL, lieux VARCHAR(200) NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME DEFAULT NULL, is_current TINYINT(1) NOT NULL, description LONGTEXT DEFAULT NULL, competences JSON DEFAULT NULL, INDEX IDX_590C103A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, diplome VARCHAR(200) NOT NULL, ecole VARCHAR(200) NOT NULL, annee_academique DATETIME NOT NULL, is_current TINYINT(1) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_404021BFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infoprofil (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, titre_profil VARCHAR(200) NOT NULL, situation VARCHAR(200) NOT NULL, comptences JSON NOT NULL, description LONGTEXT DEFAULT NULL, website LONGTEXT DEFAULT NULL, twitter LONGTEXT DEFAULT NULL, linkedin LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_66B79BFEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langue (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, libelle VARCHAR(150) NOT NULL, niveau VARCHAR(200) NOT NULL, INDEX IDX_9357758EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, lien LONGTEXT NOT NULL, titre VARCHAR(200) NOT NULL, created_at DATETIME NOT NULL, is_current TINYINT(1) NOT NULL, INDEX IDX_7CC7DA2CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE infoprofil ADD CONSTRAINT FK_66B79BFEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE langue ADD CONSTRAINT FK_9357758EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD is_visible TINYINT(1) DEFAULT NULL, ADD birthday DATETIME DEFAULT NULL, ADD sexe VARCHAR(25) DEFAULT NULL, ADD ville VARCHAR(150) DEFAULT NULL, ADD code_postal INT DEFAULT NULL, ADD pays VARCHAR(150) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE infoprofil');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE video');
        $this->addSql('ALTER TABLE user DROP is_visible, DROP birthday, DROP sexe, DROP ville, DROP code_postal, DROP pays');
    }
}
