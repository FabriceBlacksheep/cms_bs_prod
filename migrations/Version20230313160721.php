<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313160721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence ADD agence_company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA95374CF09 FOREIGN KEY (agence_company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_64C19AA95374CF09 ON agence (agence_company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA95374CF09');
        $this->addSql('DROP INDEX IDX_64C19AA95374CF09 ON agence');
        $this->addSql('ALTER TABLE agence DROP agence_company_id');
    }
}
