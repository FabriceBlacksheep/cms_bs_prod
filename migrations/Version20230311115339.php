<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230311115339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ADD stateofplay_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEDA5F62E3 FOREIGN KEY (stateofplay_id) REFERENCES stateofplay (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E00CEDDEDA5F62E3 ON booking (stateofplay_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEDA5F62E3');
        $this->addSql('DROP INDEX UNIQ_E00CEDDEDA5F62E3 ON booking');
        $this->addSql('ALTER TABLE booking DROP stateofplay_id');
    }
}
