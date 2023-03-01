<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221153559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse_agence (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agence ADD adresse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA94DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19AA94DE7DC5C ON agence (adresse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adresse_agence');
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA94DE7DC5C');
        $this->addSql('DROP INDEX UNIQ_64C19AA94DE7DC5C ON agence');
        $this->addSql('ALTER TABLE agence DROP adresse_id');
    }
}
