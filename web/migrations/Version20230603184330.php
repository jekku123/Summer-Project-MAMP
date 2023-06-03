<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230603184330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE feedback (id INT AUTO_INCREMENT NOT NULL, attendee_id INT DEFAULT NULL, event_id INT DEFAULT NULL, message LONGTEXT NOT NULL, INDEX IDX_D2294458BCFD782A (attendee_id), INDEX IDX_D229445871F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D2294458BCFD782A FOREIGN KEY (attendee_id) REFERENCES attendee (id)');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D229445871F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE conference_seminar DROP FOREIGN KEY FK_4400B330604B8382');
        $this->addSql('ALTER TABLE conference_seminar DROP FOREIGN KEY FK_4400B330735A6AB8');
        $this->addSql('DROP TABLE conference_seminar');
        $this->addSql('DROP TABLE seminar');
        $this->addSql('DROP TABLE conference');
        $this->addSql('ALTER TABLE attendee ADD registered_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE event ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE speaker ADD event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speaker ADD CONSTRAINT FK_7B85DB6171F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('CREATE INDEX IDX_7B85DB6171F7E88B ON speaker (event_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conference_seminar (conference_id INT NOT NULL, seminar_id INT NOT NULL, INDEX IDX_4400B330604B8382 (conference_id), INDEX IDX_4400B330735A6AB8 (seminar_id), PRIMARY KEY(conference_id, seminar_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE seminar (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, location VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE conference (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, location VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE conference_seminar ADD CONSTRAINT FK_4400B330604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conference_seminar ADD CONSTRAINT FK_4400B330735A6AB8 FOREIGN KEY (seminar_id) REFERENCES seminar (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D2294458BCFD782A');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D229445871F7E88B');
        $this->addSql('DROP TABLE feedback');
        $this->addSql('ALTER TABLE event DROP type');
        $this->addSql('ALTER TABLE speaker DROP FOREIGN KEY FK_7B85DB6171F7E88B');
        $this->addSql('DROP INDEX IDX_7B85DB6171F7E88B ON speaker');
        $this->addSql('ALTER TABLE speaker DROP event_id');
        $this->addSql('ALTER TABLE attendee DROP registered_at');
    }
}
