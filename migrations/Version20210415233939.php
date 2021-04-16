<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210415233939 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, date_debut_contrat DATE DEFAULT NULL, min_garanti INT DEFAULT NULL, date_debut_voyage DATE DEFAULT NULL, date_fin_voyage DATE DEFAULT NULL, actif TINYINT(1) DEFAULT NULL, fees_internet TINYINT(1) DEFAULT NULL, montant_fees INT DEFAULT NULL, pay_later TINYINT(1) DEFAULT NULL, pay_later_time_limit VARCHAR(255) DEFAULT NULL, min_vol_cc VARCHAR(255) DEFAULT NULL, min_vol_balance VARCHAR(255) DEFAULT NULL, timbre VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contrat');
    }
}
