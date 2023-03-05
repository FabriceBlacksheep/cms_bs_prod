<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230305012550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campervan_agence (campervan_id INT NOT NULL, agence_id INT NOT NULL, INDEX IDX_E52BEF12B9D53E94 (campervan_id), INDEX IDX_E52BEF12D725330D (agence_id), PRIMARY KEY(campervan_id, agence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campervan_agence ADD CONSTRAINT FK_E52BEF12B9D53E94 FOREIGN KEY (campervan_id) REFERENCES campervan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE campervan_agence ADD CONSTRAINT FK_E52BEF12D725330D FOREIGN KEY (agence_id) REFERENCES agence (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campervan_agence DROP FOREIGN KEY FK_E52BEF12B9D53E94');
        $this->addSql('ALTER TABLE campervan_agence DROP FOREIGN KEY FK_E52BEF12D725330D');
        $this->addSql('DROP TABLE campervan_agence');
    }
}
