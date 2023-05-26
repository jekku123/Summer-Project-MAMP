<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230526102639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booth (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, exhibition_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, booth_number VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_D24EDE0979B1AD6 (company_id), INDEX IDX_D24EDE02A7D4494 (exhibition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, website VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conference (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(255) NOT NULL, image_url VARCHAR(255) NOT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conference_speaker (id INT AUTO_INCREMENT NOT NULL, conference_id INT DEFAULT NULL, speaker_id INT DEFAULT NULL, INDEX IDX_807844D9604B8382 (conference_id), INDEX IDX_807844D9D04A0F27 (speaker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exhibition (id INT AUTO_INCREMENT NOT NULL, conference_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(255) NOT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B8353389604B8382 (conference_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, conference_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D044D5D4604B8382 (conference_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_speaker (id INT AUTO_INCREMENT NOT NULL, session_id INT DEFAULT NULL, speaker_id INT DEFAULT NULL, INDEX IDX_695D593B613FECDF (session_id), INDEX IDX_695D593BD04A0F27 (speaker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, bio LONGTEXT NOT NULL, organization VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booth ADD CONSTRAINT FK_D24EDE0979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE booth ADD CONSTRAINT FK_D24EDE02A7D4494 FOREIGN KEY (exhibition_id) REFERENCES exhibition (id)');
        $this->addSql('ALTER TABLE conference_speaker ADD CONSTRAINT FK_807844D9604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id)');
        $this->addSql('ALTER TABLE conference_speaker ADD CONSTRAINT FK_807844D9D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id)');
        $this->addSql('ALTER TABLE exhibition ADD CONSTRAINT FK_B8353389604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id)');
        $this->addSql('ALTER TABLE session_speaker ADD CONSTRAINT FK_695D593B613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE session_speaker ADD CONSTRAINT FK_695D593BD04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booth DROP FOREIGN KEY FK_D24EDE0979B1AD6');
        $this->addSql('ALTER TABLE booth DROP FOREIGN KEY FK_D24EDE02A7D4494');
        $this->addSql('ALTER TABLE conference_speaker DROP FOREIGN KEY FK_807844D9604B8382');
        $this->addSql('ALTER TABLE conference_speaker DROP FOREIGN KEY FK_807844D9D04A0F27');
        $this->addSql('ALTER TABLE exhibition DROP FOREIGN KEY FK_B8353389604B8382');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4604B8382');
        $this->addSql('ALTER TABLE session_speaker DROP FOREIGN KEY FK_695D593B613FECDF');
        $this->addSql('ALTER TABLE session_speaker DROP FOREIGN KEY FK_695D593BD04A0F27');
        $this->addSql('DROP TABLE booth');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE conference');
        $this->addSql('DROP TABLE conference_speaker');
        $this->addSql('DROP TABLE exhibition');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_speaker');
        $this->addSql('DROP TABLE speaker');
    }
}
