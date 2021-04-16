<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210411211019 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, office_id INT DEFAULT NULL, devise VARCHAR(255) DEFAULT NULL, organisme VARCHAR(255) DEFAULT NULL, matricule_fiscale VARCHAR(255) DEFAULT NULL, proprietaire VARCHAR(255) DEFAULT NULL, responsable VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', fax VARCHAR(255) DEFAULT NULL, actif TINYINT(1) DEFAULT NULL, url_logo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE compte');
    }
}
