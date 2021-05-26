<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526120434 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, office_id INT DEFAULT NULL, devise VARCHAR(255) DEFAULT NULL, organisme VARCHAR(255) DEFAULT NULL, matricule_fiscale VARCHAR(255) DEFAULT NULL, proprietaire VARCHAR(255) DEFAULT NULL, responsable INT DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', fax VARCHAR(255) DEFAULT NULL, actif TINYINT(1) DEFAULT NULL, url_logo VARCHAR(255) DEFAULT NULL, balance DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, compte_id INT DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, date_debut_contrat DATE DEFAULT NULL, min_garanti INT DEFAULT NULL, date_debut_voyage DATE DEFAULT NULL, date_fin_voyage DATE DEFAULT NULL, actif TINYINT(1) DEFAULT NULL, fees_internet TINYINT(1) DEFAULT NULL, montant_fees INT DEFAULT NULL, pay_later TINYINT(1) DEFAULT NULL, pay_later_time_limit VARCHAR(255) DEFAULT NULL, min_vol_cc VARCHAR(255) DEFAULT NULL, min_vol_balance VARCHAR(255) DEFAULT NULL, timbre VARCHAR(255) DEFAULT NULL, INDEX IDX_60349993F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, compteid_id INT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, objet VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, INDEX IDX_CE6064047A59EAD0 (compteid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, compte_id INT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, INDEX IDX_723705D1F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, Compte_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D6497034E483 (Compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064047A59EAD0 FOREIGN KEY (compteid_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497034E483 FOREIGN KEY (Compte_id) REFERENCES compte (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F2C56620');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064047A59EAD0');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1F2C56620');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497034E483');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE user');
    }
}
