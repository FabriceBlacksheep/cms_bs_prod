<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215133111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content ADD title_de VARCHAR(255) DEFAULT NULL, ADD description_de LONGTEXT DEFAULT NULL, ADD h1_de VARCHAR(255) DEFAULT NULL, ADD slug_de VARCHAR(255) DEFAULT NULL, ADD title_en VARCHAR(255) DEFAULT NULL, ADD description_en LONGTEXT DEFAULT NULL, ADD h1_en VARCHAR(255) DEFAULT NULL, ADD slug_en VARCHAR(255) DEFAULT NULL, ADD title_nl VARCHAR(255) DEFAULT NULL, ADD description_nl LONGTEXT DEFAULT NULL, ADD h1_nl VARCHAR(255) DEFAULT NULL, ADD slug_nl VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content DROP title_de, DROP description_de, DROP h1_de, DROP slug_de, DROP title_en, DROP description_en, DROP h1_en, DROP slug_en, DROP title_nl, DROP description_nl, DROP h1_nl, DROP slug_nl');
    }
}
