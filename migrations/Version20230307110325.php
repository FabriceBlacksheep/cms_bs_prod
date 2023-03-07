<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307110325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campervan ADD img_gallery_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE campervan ADD CONSTRAINT FK_6891BB7FEA0ED812 FOREIGN KEY (img_gallery_id) REFERENCES img_gallery (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6891BB7FEA0ED812 ON campervan (img_gallery_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campervan DROP FOREIGN KEY FK_6891BB7FEA0ED812');
        $this->addSql('DROP INDEX UNIQ_6891BB7FEA0ED812 ON campervan');
        $this->addSql('ALTER TABLE campervan DROP img_gallery_id');
    }
}
