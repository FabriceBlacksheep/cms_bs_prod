<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230208095026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_content (category_id INT NOT NULL, content_id INT NOT NULL, INDEX IDX_391D70D712469DE2 (category_id), INDEX IDX_391D70D784A0A3ED (content_id), PRIMARY KEY(category_id, content_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_content ADD CONSTRAINT FK_391D70D712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_content ADD CONSTRAINT FK_391D70D784A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_content DROP FOREIGN KEY FK_391D70D712469DE2');
        $this->addSql('ALTER TABLE category_content DROP FOREIGN KEY FK_391D70D784A0A3ED');
        $this->addSql('DROP TABLE category_content');
    }
}
