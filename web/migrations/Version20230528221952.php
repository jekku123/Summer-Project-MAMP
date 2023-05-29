<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230528221952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conference ADD event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE conference ADD CONSTRAINT FK_911533C871F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('CREATE INDEX IDX_911533C871F7E88B ON conference (event_id)');
        $this->addSql('ALTER TABLE seminar ADD event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seminar ADD CONSTRAINT FK_BFFD2C8871F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('CREATE INDEX IDX_BFFD2C8871F7E88B ON seminar (event_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conference DROP FOREIGN KEY FK_911533C871F7E88B');
        $this->addSql('ALTER TABLE seminar DROP FOREIGN KEY FK_BFFD2C8871F7E88B');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP INDEX IDX_911533C871F7E88B ON conference');
        $this->addSql('ALTER TABLE conference DROP event_id');
        $this->addSql('DROP INDEX IDX_BFFD2C8871F7E88B ON seminar');
        $this->addSql('ALTER TABLE seminar DROP event_id');
    }
}
