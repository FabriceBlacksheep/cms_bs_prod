<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313160923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence ADD societe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9FCF77503 FOREIGN KEY (societe_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_64C19AA9FCF77503 ON agence (societe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA9FCF77503');
        $this->addSql('DROP INDEX IDX_64C19AA9FCF77503 ON agence');
        $this->addSql('ALTER TABLE agence DROP societe_id');
    }
}
