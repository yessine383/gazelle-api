<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210418113409 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE balance ADD compte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE balance ADD CONSTRAINT FK_ACF41FFEF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ACF41FFEF2C56620 ON balance (compte_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE balance DROP FOREIGN KEY FK_ACF41FFEF2C56620');
        $this->addSql('DROP INDEX UNIQ_ACF41FFEF2C56620 ON balance');
        $this->addSql('ALTER TABLE balance DROP compte_id');
    }
}
