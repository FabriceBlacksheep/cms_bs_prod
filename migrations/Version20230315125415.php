<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230315125415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence_vehicule DROP FOREIGN KEY FK_8A7FF804A4A3511');
        $this->addSql('ALTER TABLE agence_vehicule DROP FOREIGN KEY FK_8A7FF80D725330D');
        $this->addSql('DROP TABLE agence_vehicule');
        $this->addSql('ALTER TABLE vehicule ADD agence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DD725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DD725330D ON vehicule (agence_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence_vehicule (agence_id INT NOT NULL, vehicule_id INT NOT NULL, INDEX IDX_8A7FF80D725330D (agence_id), INDEX IDX_8A7FF804A4A3511 (vehicule_id), PRIMARY KEY(agence_id, vehicule_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE agence_vehicule ADD CONSTRAINT FK_8A7FF804A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agence_vehicule ADD CONSTRAINT FK_8A7FF80D725330D FOREIGN KEY (agence_id) REFERENCES agence (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DD725330D');
        $this->addSql('DROP INDEX IDX_292FFF1DD725330D ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP agence_id');
    }
}
